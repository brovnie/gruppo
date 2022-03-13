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
    public function index( $username)
    {
        $user = User::where('username', $username)->first();
        if(isset($username)) {
            return view('profile', [ 'user' => $username ]);
        }

        return "user nof found";


      /*  $user = User::where('username', $user)->first();
        if(isset($user))
            return view('tampilkan', ['username' => $user]);
        return "user not found!"; */
    
    }
}
