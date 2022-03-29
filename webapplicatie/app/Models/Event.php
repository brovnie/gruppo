<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];   
    /**
     * Connect with participants
     */
    public function participants() {
        
        return $this->belongsToMany(Profile::class)->withTimestamps();
    }
}
