@extends('layouts.app')

@section('content')
<div>
<p>{{__('Personaliseren')}}</p>
<form enctype="multipart/form-data" method="post" action='/profiles/{{$user->username}}/create-step-two'>
        @csrf
        @method('PATCH')   
    <div>
        <img src="" alt='profile avatar'>
        <div class="edit-icon"></div>
        <input type="file" id="profil_photo" name="profil_photo">
    </div>
    <div>
        <label>{{__('Favoriete sport')}}</label>
        <select name="favorite_sport" id="favorite_sport">
            <option value="american_football">{{__('American football')}}</option>
            <option value="basketbal">{{__('Basketbal')}}</option>
            <option value="cricket">{{__('Cricket')}}</option>
            <option value="handbal">{{__('Handbal')}}</option>
            <option value="hockey">{{__('Hockey')}}</option>
            <option value="ijshockey">{{__('Ijshockey')}}</option>
            <option value="korfbal">{{__('Korfbal')}}</option>
            <option value="tennis">{{__('Tennis')}}</option>
            <option value="voetbal">{{__('Voetbal')}}</option>
            <option value="vollebal">{{__('Volleybal')}}</option>
            <option value="waterpolo">{{__('Waterpolo')}}</option>
        </select>
    </div>
    <div>
    <label for="biography">{{__('Biography')}}</label>
        <textarea row="5" id="biography" name="biography"></textarea>
    </div>
    <button type="submit">{{__('Volgende')}}</button>
</form>
</div>
@endsection