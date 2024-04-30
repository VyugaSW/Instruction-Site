@extends('layouts.app')

@section('title','userPage')

@section('content')
    <h3>All works:</h3>
    <div class="row col-md-8 col-lg-9 col-sm-5 gap-5">
        @include('instruction.instructions_draw_all',$instructions)
    </div>
    <div class="row col-md-4 col-lg-3 col-sm-5">
        <div class="row">
            <div class="col-md-2 col-lg-2 col-sm-2">
                <div class="vr h-100"></div>
            </div>
            <div class="col-md-10 col-lg-10 col-sm-10 mb-3">
                <div>
                <h3 id="userLogin">{{$login}}</h3>
                <a href="/user?id={{$userid}}" target="_blank" class="hover-zoom border-0 p-0 rounded btn " style="width: 16rem;" title="To {{$login}} page">
                    <img src="{{asset('storage/'.$avatar)}}" alt="avatar" class="rounded img-fluid z-0" style="width: 18rem; height: 20rem">
                </a>
                </div>
                @if(session('radmin'))
                    @if($blockstatusid == 1)
                    <button value="{{$userid}}" class="btn btn-outline-danger fs-3 w-100 mt-5" onclick="blockUser(this.value)">Block</button>
                    @elseif($blockstatusid == 2)
                    <button value="{{$userid}}" class="btn btn-outline-success fs-3 w-100 mt-5" onclick="unblockUser(this.value)">Unblock</button>
                    @endif
                @endif
            </div>
        </div>
        <hr style="margin-left: 5%; width: 100%">
    </div>
    <script src="{{asset('js/user_block_ajax.js')}}"></script>
@endsection