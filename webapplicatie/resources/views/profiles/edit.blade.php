@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <p>{{__('Account Information')}}</p>
        <p>{{__('Profil Information')}}</p>
        <p></p>

</div>
<p>{{__('Over jou')}}</p>
   <form>
    <div>
        <label class="text-bold" for="name">{{__('Persoonlijk')}}</label>
        <input type="text" name="" id="" placeholder="{{__('Voornaam')}}">
        <input type="text" name="" id="" placeholder="{{__('Achternaam')}}">
    </div>    
    <div>
        <label for="location">{{__('Locatie')}}</label>
        <select>

        </select>
        <input type="text" name="" id="" placeholder="{{__('Achternaam')}}">
    </div>  
    <div>
        <label for="Locali">{{__('Localisatie')}}</label>
        <input type="text" name="" id="">
    </div>  
    <div>
        <label for="username">{{__('Geslacht')}}</label>
        <input type="text" name="" id="">
    </div>  
    <div>
        <label for="username">{{__('Gebortedatum')}}</label>
        <input type="text" name="" id="">
    </div>  
</form>
</div>
<script>
    $(document).ready(function(){

getCities();

function getCities() {
  $.ajax({
    method: 'GET',
    url: '/api/v1/cities',
    dataType: 'json',
    success: function(data) {
      console.log(data);
    },
    error: function(error) {
      console.log(error);
    }
  });
}

});
</script>
@endsection
