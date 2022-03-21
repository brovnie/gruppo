@extends('layouts.app')

@section('content')
<div>
<p>{{__('Personaliseren')}}</p>
<form method="post" action='/profiles/{{$user->username}}/create-step-two'>
@csrf
        @method('PATCH')
    <div>
        <img src="" alt='profile avatar'>
        <div class="edit-icon"></div>
        <input type="file" id="profil_photo" name="profil_photo">
    </div>
    <div>
        <label>{{__('Favoriete sport')}}</label>
        <select>
            <option>{{__('American football')}}</option>
            <option>{{__('Basketbal')}}</option>
            <option>{{__('Cricket')}}</option>
            <option>{{__('Handbal')}}</option>
            <option>{{__('Hockey')}}</option>
            <option>{{__('Ijshokey')}}</option>
            <option>{{__('Korfbal')}}</option>
            <option>{{__('Tennis')}}</option>
            <option>{{__('Voetbal')}}</option>
            <option>{{__('Volleybal')}}</option>
            <option>{{__('Waterpolo')}}</option>
        </select>
    </div>
    <div>
    <label>{{__('Biography')}}</label>
        <textarea row="5"></textarea>
    </div>
    <button type="submit" name="personaliseren">{{__('Volgende')}}</button>
</form>
</div>
@endsection