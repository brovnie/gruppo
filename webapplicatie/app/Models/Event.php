<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
        
    /**
     * Connect with participants
     */
    public function participants() {
        return $this->belongsToMany(Profile::class);
    }
}
