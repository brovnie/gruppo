<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
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

    /**
    * Multistap create profile
    * 
    */
    public function createStepOne( $username ) {
        $this->authorize('createStepOne', $username->profile);
        return view('profiles.createStepOne', [ 'user' => $username ]);    
    }

    public function storeStepOne( $username ) {
        $this->authorize('createStepOne', $username->profile);
        $username->profile->update([
            'name' => 'test',
            'familyname' => 'test',
            'location' => 'Test',
            'gender' => 'm',
            'birthdate' => '2000-03-21',
        ]);

        return redirect()->route('profile.create.step.two', [ 
            'user' => $username,
        'username' => $username->username ]);
    }

    public function createStepTwo( $username ) {
        $this->authorize('createStepTwo', $username->profile);
        return view('profiles.createStepTwo', [ 'user' => $username ]);    
    }

    public function storeStepTwo( $username ) {        
        $username->profile->update([
            'profil_photo' => 'test',
            'favorite_sport' => 'test',
            'biography' => 'Test',
        ]);
        
        $username->update([
            'new_user' => 0
        ]);

       return redirect()->route('events', [ 
            'user' => $username,
            'username' => $username->username ]);

   }
    /**
     * Edit profile
     */
    public function edit( $username )
    {  
        $this->authorize('edit', $username->profile);
        return view('profiles.edit', [ 'username' => $username ]);    
    }


}
