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

    public function edit( $username )
    {
    return view('profiles.edit', [ 'user' => $username ]);    
    }
}
