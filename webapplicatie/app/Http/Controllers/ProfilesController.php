<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        $data = request()->validate([
            'name' => 'required|max:255',
            'familyname' => 'nullable',
            'location' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
        ]);

        $username->profile->update( $data );

        return redirect()->route('profile.create.step.two', [ 
            'user' => $username,
        'username' => $username->username ]);
    }

    public function createStepTwo( $username ) {
        $this->authorize('createStepTwo', $username->profile);
        return view('profiles.createStepTwo', [ 'user' => $username ]);    
    }

    public function storeStepTwo( $username, Request $request ) {      
        
        $data = request()->validate([
            'profil_photo' => 'required',
            'favorite_sport' => 'required',
            'biography' => 'nullable|max:255',
        ]);

        if (request('profil_photo')) {
            $imagePath = $request->file('profil_photo')->store('profiles','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(150, 150);
            $image->save();

            $imageArray = ['profil_photo' => $imagePath];
        }

        $username->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        
        $username->update([
            'new_user' => 0
        ]);

       return redirect()->route('events');
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
