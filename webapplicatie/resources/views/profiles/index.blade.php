@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <p class="font-bold">{{$user->username}}</p>
    </div>
    <div>
        <div>
            <img src="/storage/{{$user->profile->profil_photo}}" alt="profile picture">
        </div>
</div>
<div>
<profile-stats 
    user-id="{{$user->id}}" 
    friends="4" 
    participated="{{ $user->profile->participated }}" 
    smileys="{{ $user->profile->smileys }}">
</profile-stats>

    <p class="font-bold">Over mij</p>
    <div>
        <p>{{ $user->profile->biography ?? 'test'}}</p>
    </div>
    <div class="flex gap-5 py-5">
        <div class="flex-1">
            <p><span></span>
                {{$user->profile->favorite_sport ?? 'n/a'}} 
            </p>
        </div>
    <div class="flex-1">
    <p><span></span>
        {{$user->profile->location ?? "n/a"}} 
</p>
    </div>
    <div class="flex-1">
    <p><span></span>
        {{$user->profile->get_age() ?? "n/a"}} years
 </p>
    </div>
</div>
<div><a href="/profiles/{{$user->username}}/edit">Profile bewerken</a></div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
