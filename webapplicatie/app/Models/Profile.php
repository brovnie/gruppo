<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    use HasFactory;
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
