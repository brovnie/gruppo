<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( $username )
    {
        return view('profiles.index', [ 'user' => $username ]);    
    }

    public function create( $username )
    {  
       $this->authorize('create', $username->profile);
       return view('profiles.create', [ 'user' => $username ]);    
    }

    public function edit( $username )
    {  
        $this->authorize('edit', $username->profile);
        return view('profiles.edit', [ 'user' => $username ]);    
    }

    
}
