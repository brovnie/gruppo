@extends('layouts.app')

@section('content')
<div class="container">
<p>create
    {{$user->id}}
    {{ Auth::user()->id }}
</p>
<div>
<p>{{__('Over jou')}}</p>
<form method="post" >
    <div>
        <label class="text-bold" for="name">{{__('Persoonlijk')}}</label>
        <input type="text" name="" id="" placeholder="{{__('Voornaam')}}">
        <input type="text" name="" id="" placeholder="{{__('Achternaam')}}">
    </div>    
        <select-city></select-city>
    <div>
        <label for="geslacht">{{__('Geslacht')}}</label>
        <select>
            <option>{{__('Man')}}</option>
            <option>{{__('Vrouw')}}</option>
            <option>{{__('Andere')}}</option>
        </select>
    </div>   
    <div>
        <label for="username">{{__('Gebortedatum')}}</label>
        <input type="date" name="" id="">
    </div>  
</form>
</div>
<div>
<p>{{__('Personaliseren')}}</p>
<form>
    <div>
        <img src="" alt='profile avatar'>
        <div class="edit-icon"></div>
        <input type="file" id="myfile" name="myfile">
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
</form>
</div>
</div>
@endsection
