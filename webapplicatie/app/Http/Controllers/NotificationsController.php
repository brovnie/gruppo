<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use App\Models\Event;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class NotificationsController extends Controller
{
    public function index( )
    {
      
        return view('notifications.index');    
    }
}
