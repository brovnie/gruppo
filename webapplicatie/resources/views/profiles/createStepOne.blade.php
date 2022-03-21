@extends('layouts.app')

@section('content')
<div class="container">
<p>{{__('Over jou')}}</p>
<form method="post" action='/profiles/{{$user->username}}/create-step-one'>
        @csrf
        @method('PATCH')
    <div>
        <label class="text-bold" for="name">{{__('Persoonlijk')}}</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            placeholder="{{__('Voornaam')}}"  
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
            autofocus>

        <input 
            type="text" 
            name="familyname" 
            id="familyname" 
            placeholder="{{__('Achternaam')}}"
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
            autofocus>
    </div>   
    <div> 
        <label for="location">Locatie</label>
        <select-city></select-city>
    </div>
    <div>
        <label for="gender">{{__('Geslacht')}}</label>
        <select id="gender" name="gender">
            <option value="m">{{__('Man')}}</option>
            <option value="v">{{__('Vrouw')}}</option>
            <option valye="x">{{__('Andere')}}</option>
        </select>
    </div>   
    <div>
        <label for="birthdate">{{__('Gebortedatum')}}</label>
        <input type="date" name="birthdate" id="birthdate">
    </div>  
    <button type="submit" name="over">{{__('Volgende"')}}</button>
</form>
</div>
@endsection
