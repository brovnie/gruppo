@section('pageTitle', 'Over jou')
@section('title', 'Gruppo - maak een profil aan')
@section('pageClass', 'createProfile1')
@extends('layouts.setup')

@section('content')
<div class="createStepOne flex-1 createProfile">
<div class="relative md:hidden hero-background"><img src="/storage/home/hero_bg.svg" class="hero-img "> <div class="img-wrapper md:hidden"><img src="/storage/logo/Logo_vertical_white.svg" class="img"></div></div>
<div class="container mx-auto md:mb-10 md:mt-10">
<form method="post" action='/profiles/{{$user->username}}/create-step-one' class=" border-xl auth-card card-shadow">
        @csrf
        @method('PATCH')
        <div class="card-header font-proximanova text-center">{{ __('Over jou') }}</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="mt-5">
        <label class="text-bold" for="name">{{__('Persoonlijk')}}</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            placeholder="{{__('Voornaam')}}"  
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            autofocus>

        <input 
            type="text" 
            name="familyname" 
            id="familyname" 
            placeholder="{{__('Achternaam')}}"
            class="form-control{{ $errors->has('familyname') ? ' is-invalid' : '' }} mt-3"
            autofocus>
    </div>   
    <div class="mt-5"> 
        <label for="location">Locatie</label>
        <select-city></select-city>
    </div>
    <div class="mt-5">
        <label for="gender">{{__('Geslacht')}}</label>
        <select id="gender" name="gender">
            <option value="m">{{__('Man')}}</option>
            <option value="v">{{__('Vrouw')}}</option>
            <option value="x">{{__('Andere')}}</option>
        </select>
    </div>   
    <div class="my-5">
        <label for="birthdate">{{__('Gebortedatum')}}</label>
        <input 
            type="date" 
            name="birthdate" 
            id="birthdate"
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
    </div>  
    <button type="submit" name="over" class="mt-5 btn btn--inline btn--orange w-auto ">{{__('Volgende')}}</button>
</form>
</div>
</div>
@endsection
