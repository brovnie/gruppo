@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <p class="font-bold">{{$user->username}}</p>
    </div>
    <div>
        <div>
            <img src="" alt="profile picture">
        </div>
</div>
<div class="flex gap-5">
    <div class="flex-1">
        <p class="font-xl font-bold">21</p>
        <p class="font-sm">Vrienden</p>
    </div>
    <div class="flex-1">
        <p class="font-xl font-bold">21</p>
        <p class="font-sm">Deelnamen</p>
    </div>
    <div class="flex-1">
        <p class="font-xl font-bold">21</p>
        <p class="font-sm">Smileys</p>
    </div>
</div>
<div>
    <p class="font-bold">Over mij</p>
    <div>
        <p>{{ $user->profile->biography}}</p>
    </div>
    <div class="flex gap-5">
    <div class="flex-1">
        <p><span></span>{{$user->profile->favorite_sport}} </p>
    </div>
    <div class="flex-1">
    <p><span></span>{{$user->profile->location}} </p>
    </div>
    <div class="flex-1">
    <p><span></span>{{$user->profile->location}} </p>
    </div>
</div>
<div><a href="#">Profile bewerken</a></div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
