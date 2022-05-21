@section('pageTitle', 'Personaliseren')
@section('title', 'Gruppo - maak een profil aan')
@section('pageClass', 'createProfile2')
@extends('layouts.setup')

@section('content')
<div class="createStepTwo createProfile">
<div class="relative md:hidden hero-background"><img src="/storage/home/hero_bg.svg" class="hero-img "> <div class="img-wrapper md:hidden"><img src="/storage/logo/Logo_vertical_white.svg" class="img"></div></div>
<div class="container mx-auto md:mb-10 md:mt-10">
<form enctype="multipart/form-data" method="post" action='/profiles/{{$user->username}}/create-step-two'  class=" border-xl auth-card card-shadow">
        @csrf
        @method('PATCH')   
        <p class="card-header font-proximanova text-center">{{__('Personaliseren')}}</p>
    <profil-image></profil-image>
    <div class="mt-5">
        <label>{{__('Favoriete sport')}}</label>
        <select name="favorite_sport" id="favorite_sport">
            <option value="american football">{{__('American football')}}</option>
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
    <div class="my-5">
    <label for="biography">{{__('Biography')}}</label>
        <textarea rows="5" id="biography" name="biography" class=></textarea>
    </div>
    <button type="submit" class="mt-5 btn btn--inline btn--orange w-auto">{{__('Profiel opslaan')}}</button>
</form>
</div>
</div>
@endsection