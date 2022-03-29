@extends('layouts.app')

@section('content')
<div class="container">
    <div>
    <p>{{__('Oproep maken')}}</p>
    </div>
<form method="post" action='/events'>
        @csrf
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
        <label for="description">{{__('Bericht')}}</label>
        <textarea row="5" id="description" name="description"></textarea>
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
                class="form-control{{ $errors->has('datum') ? ' is-invalid' : '' }}"
                max=" {{ Carbon\Carbon::now()->format('Y-m-d')}} "
                autofocus>
        </div>  
        <div>
            <label for="start_time">{{__('Tijd')}}</label>
            <input 
                type="time" 
                name="start_time" 
                id="start_time"
                class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}"
                autofocus>
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
            <div>
                <label for="adress">{{__('Straat')}}</label>
                <input 
                    type="text" 
                    name="adress" 
                    id="adress" 
                    class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}"
                    autofocus>
            </div>
            <div>
                <label for="adress_nr">{{__('Nr')}}</label>
                <input 
                    type="text" 
                    name="adress_nr" 
                    id="adress_nr" 
                    class="form-control{{ $errors->has('adress_nr') ? ' is-invalid' : '' }}"
                    autofocus>
            </div>
        </div>
        <div>
            <label for="players">{{__('Aantal personen')}} ({{__('exc. jij')}}) </label>
            <players-range></players-range>
        </div>
        <div>
            <label for="equipment">{{__('Baal aanwezig?')}}</label>
            <div>
                <label class="switch">
                    <input type="checkbox" name="equipment" id="equipment" value="1">
                    <span class="toggler round"></span>
                </label>
            </div>
        </div>
    </div>
    <button type="submit">{{__('Oproep aanmaken')}}</button>
</form>
</div>
@endsection
