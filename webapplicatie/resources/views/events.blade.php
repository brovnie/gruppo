@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Welcome to events</p>
                    <p class="font-bold">{{$user->username}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <a href="/events/create" >Create event</a>
</div>
@endsection
