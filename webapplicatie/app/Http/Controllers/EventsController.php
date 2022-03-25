<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Event;

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
     *
     * @param  array  $data
     * @return \App\Models\Event
     */
    protected function store(array $data)
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
