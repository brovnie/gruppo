<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewParticipant;

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
    
    protected function edit( $event )
    {
        return view('events.create', ['event' => $event]);  
    }

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

    protected function addPlayer($event, Request $request) {   

        $profile = auth()->user()->profile;
        $profile->participate()->syncWithoutDetaching([$event->id], false);

        $team = $event->participants()->get();

        foreach ($team as $player) {
            $user = User::where('id', $player->user_id)->first();
            $player->username = $user->username;
        }
         
        event(new NewParticipant($team));

        return redirect()->route('event.show', [ 'event' => $event ]);
    }

    protected function getTeam($event, Request $request) {   
        $team = $event->participants()->get();

        foreach ($team as $player) {
            $user = User::where('id', $player->user_id)->first();
            $player->username = $user->username;
        }

        return $team;
    }

}
