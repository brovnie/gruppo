<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewParticipant;
use App\Events\DeletePlayer;
use App\Events\ParticipantsCounter;
use App\Events\BestPlayer;
use App\Events\SmileyUpdate;
use App\Events\ParticipatedUpdate;

class EventsController extends Controller
{
    /**
     * Event page
     * 
     */
    public function index( $event )
    {
        $admin = Profile::where('user_id', $event->admin_id)->first();
        return view('events.index', [ 'event' => $event ]);    
    }

    /**
     * Create event page
     * 
     */
    public function create()
    {
        return view('events.create');    
    }

    /**
     * Create a new event 
     * 
     */
    protected function store(Request $request)
    {
        $data = request()->validate([
            'sport' => 'required',
            'location' => 'required',
            'adress' => 'required|max:255',
            'adress_nr' => 'required|max:255',
            'date' => 'required',
            'start_time' => 'required',
            'equipment' => 'nullable',
            'allowed_participants' => 'required',
            'registered_participants' => 'nullable',
            'description' => 'required|max: 255'
        ]);
        $user = Auth::user()->id;
        $eventCreator = ['admin_id' => $user];
        $newData = array_merge($data, $eventCreator);

        $event = Event::create($newData);
    
        $profile = auth()->user()->profile;
        $profile->participate()->attach($event->id);
        
        return redirect()->route('events', ['user' => $user]);
    }
    
    /**
     * Edit event 
     * 
     */
    protected function edit( $event )
    {
        return view('events.create', ['event' => $event]);  
    }

    /**
     * Upadte existing event 
     * 
     */

    protected function update( $event, Request $request )
    {
        $data = request()->validate([
            'sport' => 'required',
            'location' => 'required',
            'adress' => 'required|max:255',
            'adress_nr' => 'required|max:255',
            'date' => 'required',
            'start_time' => 'required',
            'equipment' => 'nullable',
            'allowed_participants' => 'required',
            'registered_participants' => 'nullable',
        ]);
        $event->update([$data]);

        return view('events.create', ['event' => $event]); 
    }

    /**
     * Get list of participants 
     * 
     */
    protected function getTeam($event) {   
        $oldTeam = $event->participants()->get();
        $team = [];
        foreach ($oldTeam as $player) {
            $user = User::where('id', $player->user_id)->first();
            $player->username = $user->username;
            array_push($team, $player);
        }

        return $team;
    }

    /**
     * Add player to the team 
     * 
     */
    protected function addPlayer($event) {   

        $registered = $event->registered_participants; 
        $registered++;
        $allowed = $event->allowed_participants;
        
        if($allowed <= $registered) {
            $playersAllowed = false;
            event(new ParticipantsCounter($playersAllowed));
            
            if($allowed < $registered) {
                return redirect()->route('event.show', [ 'event' => $event ]);
            }
        }

        $event->registered_participants = $registered;
        $event->save();

        $profile = auth()->user()->profile;
        $profile->participate()->syncWithoutDetaching([$event->id], false);

        $team = $this->getTeam($event);

        event(new NewParticipant($team));

        return redirect()->route('event.show', [ 'event' => $event ]);
    }

    /**
     * Remove player from event
     * 
     */
    protected function destroyPlayer($event, $user_id) {
        $event->participants()->detach($user_id);
        $team = $this->getTeam($event);

        $registered = $event->registered_participants; 
        $registered--;
        $event->registered_participants = $registered;
        $event->save();
        $playersAllowed = true;
        event(new ParticipantsCounter($playersAllowed));
        event(new DeletePlayer($team));
        return redirect()->route('event.show', [ 'event' => $event ]);
    }

    /**
     * Check if the team is not complite
     * 
     */
    protected function checkAvailabilty($event) {
        $allowed = $event->allowed_participants;
        $registered = $event->registered_participants;

        return ($registered < $allowed) ? true : false ;
    }

    /**
     * Get best player 
     * 
     */
    protected function getBestPlayer($event) {        
        $player = $event->best_player;

        if($player != null) {
            $bp_profile = Profile::where('user_id', $player)->first();
            $bestPlayer = [
                'id' => $bp_profile->user_id,
                'username' => $bp_profile->user->username,
                'profile_photo' => $bp_profile->profil_photo
            ];
        
            return $bestPlayer;
        } 
        return false;
    }

    /**
     * Show result form
     * 
     */
    protected function indexResults( $event ) {
        $currentUser = Auth::user()->id;

        $team = $event->participants()->get();
        foreach ($team as $player) {
            if($currentUser ===  $player->user_id) {
                return view('events.results', [ 'event' => $event ]);  
            }
        }
        return view('events.index', [ 'event' => $event ]);
  
    }

    /**
     * Update game results / finish game
     * 
     */
    protected function updateResults( $event, $user, Request $request ) {
        $currentUser = Auth::user()->id;
        $data = request()->validate([
            'best_player_id' => 'required',
        ]);
        
        if($currentUser == $user) {
            $this->updateParticipation($currentUser);
            $this->desactivateUser($event, $currentUser);
            $this->saveBestPlayer($event, $data, $currentUser, $user);
            $this->setGamesBestPlayer($event);            
            
           // return redirect()->route('event.show', [ 'event' => $event]);  
        } 
    }

    protected function saveBestPlayer($event, $data, $currentUser, $user){
        $player = $event->participants()->where('user_id', $currentUser);
        $bp = $player->get()[0]->best_player_id;
        if($bp == null) {
            $event->participants()->updateExistingPivot($user, $data);
        } 
    }

    protected function setGamesBestPlayer($event) {
        $bp_chosen = array();

        foreach($event->participants as $player) {
            $bp_id = $player->pivot->best_player_id;
            if($bp_id == null) {
               // return redirect()->route('event.show', [ 'event' => $event ]);  
            }
            array_push($bp_chosen, $bp_id);
        }

        $bp_results = array_count_values($bp_chosen);
        $bp_id = array_key_first($bp_results);
        $bp_profile = Profile::where('user_id', $bp_id)->first();
        $bp_profile->smileys = $bp_profile->smileys + 1;
        $bp_profile->save();

        $bestPlayer = [
            'id' => $bp_id,
            'username' => $bp_profile->user->username,
            'profile_photo' => $bp_profile->profil_photo,
        ];
    
        event(new BestPlayer($bestPlayer));
        event(new SmileyUpdate(['userId' => $bp_profile->user_id, 'smileys' =>  $bp_profile->smileys]));  

        $event->update(['best_player' => $bp_id]);
    }

    protected function updateParticipation($currentUser){
        $user_profile = Profile::where('user_id', $currentUser)->first();
        $user_profile->participated = $user_profile->participated + 1;
        $user_profile->save();
        event(new ParticipatedUpdate(['userId' => $currentUser, 'count' => $user_profile->participated ]));
    }

    protected function desactivateUser($event, $currentUser){
        $player = $event->participants()->where('user_id', $currentUser);
        var_dump($player->get()[0]->active);// = false;
     //   $player->save();
    }
}