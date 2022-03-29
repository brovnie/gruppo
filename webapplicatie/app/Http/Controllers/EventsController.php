<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Event page
     * 
     */
    public function index( $event )
    {
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
        ]);
        $user = Auth::user()->id;
        $eventCreator = ['admin_id' => $user];
        $newData = array_merge($data, $eventCreator);

        $event = Event::create($newData);
    
        $profile = auth()->user()->profile;
        $profile->participate()->attach($event->id);
        
        return redirect()->route('events', ['user' => $user]);
    }
    
    protected function edit(array $data)
    {
        $data = request()->validate([
            'sport' => 'required',
            'location' => 'required',
            'adress' => 'required|max:255',
            'date' => 'required',
            'equipment' => 'required',
            'allowed_participants' => 'required',
        ]);

        $event = Event::create($data);
        
        return $event;
    }


}
