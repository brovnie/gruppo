<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'familyname',
        'location',
        'gender',
        'birthdate',
        'favorite_sport',
        'biography',
        'profil_photo',
    ];

    /**
    * Connect with User
    */
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    /**
     * Participate in events
     */
    public function participate(){
        return $this->belongsToMany(Event::class)->withPivot('best_player_id')->withTimestamps();
    }

    /**
    * Get user age.
    */
    public function get_age()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }

    
    /**
    * Get username
    */
    public function get_username()
    {
        return "@" . $this->user()->get()[0]->username;
    }

    public function getAdminFromEvent($event) {
        $admin = Profile::where('user_id', $event->admin_id)->first();
        return $admin;
    }
}
