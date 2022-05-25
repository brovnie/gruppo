<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sport',
        'location',
        'adress',
        'adress_nr',
        'date',
        'equipment',
        'start_time',
        'favorite_sport',
        'allowed_participants',
        'registered_participants',
        'admin_id',
        'description',
        'best_player',
    ];   
    /**
     * Connect with participants
     */
    public function participants() {
        return $this->belongsToMany(Profile::class)->withPivot('best_player_id')->withTimestamps();
    }

    public function isUserParticipating() {
        $user =  Auth::id();
        
        $participants = $this->participants()->get();
        foreach($participants as $participant) {
            if($participant->user->id == $user){
                return true;
            }
        }
        return false;
    }

    public function getTimeWithoutSeconds() {
        $time = $this->attributes['start_time'];
        $time = Carbon::parse($time)->format('H:i');
        
        return $time;
    }

    public function getDate($attribute) {
        $date = $this->attributes[$attribute];
        $date = Carbon::parse($date)->format('d-m-Y');
        
        return $date;
    }

    public function getAdmin(){
        $admin_id = $this->attributes['admin_id'];
        $admin = Profile::where('user_id', $admin_id )->first();

        return $admin;
    }
    
    public function isGameToday(){
        $today = Carbon::today()->toDateString();
        $eventDate = $this->attributes['date'];

        return $today >= $eventDate;
    }

    public function hasUserChooseBestPlayer() {

        if($this->isUserParticipating()){
            $bestPlayer =  Auth::user()->profile->participate;
            
            $getBestPlayer = $bestPlayer[0]->pivot->best_player_id;
            return $getBestPlayer !== null;
        }
        return false;
    }

    public function getAdminFromEvent($event) {
        $admin = Profile::where('user_id', $event->admin_id)->first();
        return $admin;
    }

}