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
    * Get user age.
    */
    public function get_age()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }

}
