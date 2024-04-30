@extends('layouts.app')

@section('title','home')

@section('content')
    <div class="d-flex align-items-center justify-content-start flex-column">
        <h1>Welcome to the
            <span class="text-info">Sharins</span> 
            <img src="{{asset('storage/images/logo.png')}}" alt="logo" style="width: 7rem; height: 7rem;">
        </h1>
        <h6>Best service to share instructions!</h6>
        @if(!session('ruser'))
            <div class="my-3">
                <h5>Not with us? Then register! <a href="/registration">Registration</a></h5>
            </div>
        @endif
    </div>
@endsection