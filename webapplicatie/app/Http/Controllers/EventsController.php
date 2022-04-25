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
     * Add player to team 
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

}
