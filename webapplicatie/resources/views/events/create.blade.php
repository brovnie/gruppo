@extends('layouts.app')

@section('content')
<div class="container">
    <div>
    <p>{{__('Oproep maken')}}</p>
    </div>
<form method="post" action='/events'>
        @csrf
        @method('PATCH')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>  
            @endforeach
        </ul>
    </div>
@endif
    <div>
        <label for="biography">{{__('Bericht')}}</label>
        <textarea row="5" id="biography" name="biography"></textarea>
    </div>
    <div>
        <label>{{__('Sport')}}</label>
        <select name="sport" id="sport">
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
        <div>
            <label for="date">{{__('Datum')}}</label>
            <input 
                type="date" 
                name="date" 
                id="date"
                class="form-control{{ $errors->has('datum') ? ' is-invalid' : '' }}">
        </div>  
        <div>
            <label for="start_time">{{__('Tijd')}}</label>
            <input 
                type="time" 
                name="start_time" 
                id="start_time"
                class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}">
        </div>  
    </div>
    <div>
        <p>{{__('Locatie')}}</p>
    <div>
        <div> 
            <label for="location">{{__('Stad')}}</label>
            <select-city></select-city>
        </div>
        <div>
            <label for="location">{{__('Adress')}}</label>
            <input 
            type="text" 
            name="adress" 
            id="adress" 
            class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}"
            autofocus>
        </div>
        <div>
            <label for="players">{{__('Aantal personen')}} ({{__('exc. jij')}}) </label>
            <input type="range" min="0" max="11" name="" id="">
        </div>
        <players-range></players-range>
        <div>
            <label for="location">{{__('Baal aanwezig?')}}</label>
        </div>
    </div>
    <button type="submit">{{__('Volgende"')}}</button>
</form>
</div>
@endsection
