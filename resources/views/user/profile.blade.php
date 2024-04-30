@extends('layouts.app')

@section('title','profile')

@section('content')

@isset($error)
    @include('modalwindows.modalwindow_errors',['errors' => [$error]])
@endif

@isset($success)
    @include('modalwindows.modalwindow_success',['message' => $success])
@endif
@if(session('ruser'))
<div class="d-flex justify-content-start mb-2 float-start w-100 justify-content-end">
    <label for="selectStatus">Choose Approval Status:</label>
    <select name="selectStatus" style="height: 1.5rem; max-width: 6rem;" onchange="getInstructions(this.value)">
        <option value="0">All</option>
        @foreach($statuses as $status)
            <option value="{{$status->id}}">{{$status->status}}</option>
        @endforeach
    </select>
</div>
<div class="d-flex flex-nowrap gap-2 w-100">
    <div class="d-flex">
        <div class="d-flex flex-column">
            <button type="submit" class="hover-zoom border-0 p-0 rounded btn btn-info" style="width: 15rem;" name="btnChangeAvatar" title="Change avatar" onclick="changeAvatar()">
                <img src="{{asset('storage/'.session('avatar'))}}" alt="Test" class="rounded img-fluid z-0" style="width: 15rem; min-height: 15rem; max-height: 18rem">
                Change avatar
            </button>
            <h3 id="userLogin">{{session('ruser')}}</h3>
            <hr>
            @if($blockstatusid == 1)
                <a href="/createInstruction" class="btn btn-success">Create new instruction</a>
            @elseif($blockstatusid == 2)
                <h8 class="text-danger">You was blocked. You cannot create new instructions</h8>
                <a href="/createInstruction" class="btn btn-success disabled">Create new instruction</a>
            @endif
        </div>
        <div class="ms-1 me-4">
            <div class="vr" style="height: 80vh"></div>
        </div>
    </div>
    <div class="d-flex gap-3 flex-wrap w-100" id="result">

    </div>
</div>
<script src="{{asset('js/profile_ajaxes.js')}}"></script>
@else
<h3 class="text-info">No no no </h3>
@endif
@endsection
