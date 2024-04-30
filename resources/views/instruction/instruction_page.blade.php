@extends('layouts.app')

@section('title',$title)

@section('content')
    <div class="row col-md-8 col-lg-9 col-sm-1">
        <div class="row mb-3">
            <div class="row gap-2">
                <h1><span class="border border-1 p-2 border-primary col-6">{{$title}}</span></h1>
                @if($approvalid == 1) <div class="bg-success text-left rounded bg-opacity-75 fs-5 p-1 text-light col-3">Approved</div>
                @elseif ($approvalid == 2) <div class="bg-warning text-left rounded bg-opacity-75 fs-5 p-1 text-light col-3">Waiting</div>
                @elseif ($approvalid == 3) <div class="bg-danger text-left rounded bg-opacity-75 fs-5 p-1 text-light col-3">NotApproved</div>
                @endif
            </div>
            <div class="fs-5">{{$description}}</div>
            <div class="row mt-4">
                <button class="col-lg-6 col-md-12 col-sm-12 btn btn-link hover-zoom" onclick="showModalImage(this.children[0])">
                    <img src="{{asset('storage/'.$imagecover)}}" alt="imagecover" style="width: 30rem;">
                </button>
                <div class="col-lg-1"></div>
                <div class="mt-1 d-flex flex-column align-items-end col-lg-5 col-md-12 col-sm-12 gap-4">
                    @if(session('ruser'))
                        @if($blockstatusid == 1)
                            <button class="btn btn-danger w-50 fs-3" onclick="getComplains()">Complain</button>
                        @elseif($blockstatusid == 2)
                            <h8 class="text-danger">You was blocked. You cannot make complains</h8>
                            <button class="btn btn-danger w-50 fs-3" disabled>Complain</button>
                        @endif
                        <div class="d-flex justify-content-between w-50">
                            <span class="fs-1"><i class="fa-solid fa-thumbs-up"></i></span>
                            <span class="fs-1"><i class="fa-solid fa-thumbs-down"></i></span>
                        </div>
                        @if(session('radmin'))
                            <button class="btn btn-outline-danger w-50 fs-3" onclick="getDeleteConfirmation()">Delete</button>
                            <select class=" form-select form-select-lg w-75 text-info" aria-label="Large select example" name="selectStatus" onchange="checkChangeSelectStatus()">
                                <option value="0" selected class="text-info">Change approval status</option>
                            @foreach($statuses as $status)
                                @if($status->id == '1')
                                    <option class="text-success" value="{{$status->id}}">{{$status->status}}</option>
                                @elseif($status->id == '2')
                                    <option class="text-warning" value="{{$status->id}}">{{$status->status}}</option>
                                @elseif($status->id == '3')
                                    <option class="text-danger" value="{{$status->id}}">{{$status->status}}</option>
                                @endif
                            @endforeach
                            </select>
                        @endif
                    @else
                        <h3 class="w-50 text-info">You must login to have to able leave complains, likes and ect.</h3>
                    @endif
                </div>
            </div>
        </div>
        <h3>Instruction images:</h3>
        <hr>
        <div class="d-flex flex-wrap gap gap-1 my-1">
            @foreach($images as $image)
                <button class="hover-zoom border-0 p-0 rounded-3 btn " style="width: 12rem;"title="view" onclick="showModalImage(this.children[0])">
                    <img src="{{asset('storage/'.$image->path)}}" alt="image" style="width: 12rem; height: 12rem;" class="rounded-3 border border-warning">
                </button>
            @endforeach
        </div>
        <hr>
        <div class="d-flex flex-wrap fs-5">
            {{$information}}
        </div>
    </div>
    <div class="row col-md-4 col-lg-3 col-sm-1">
        <div class="col-md-2 col-lg-2 col-sm-2">
            <div class="vr h-100"></div>
        </div>
        <div class="col-md-10 col-lg-10 col-sm-10">
        <h2>Author:</h2>
            <div>
            <h3 id="userLogin">{{$login}}</h3>
            <a href="/user?id={{$userid}}" target="_blank" class="hover-zoom border-0 p-0 rounded btn " style="width: 16rem;" title="To {{$login}} page">
                <img src="{{asset('storage/'.$avatar)}}" alt="avatar" class="rounded img-fluid z-0" style="width: 18rem; height: 20rem">
            </a>
            </div>
            @if($approvalid == 3 && session('ruser') == $login)
                <hr class="w-100">
                <div class="mt-3">
                    <h5 class="text-info">Your instruction was not approved? <br> Request one more time for approving!</h5>
                    <button class="btn btn-outline-success fs-5 w-100" onclick="changeApproval(document.getElementById('hidden_el_ins_id').innerText,'2')">Request for approving</button>
                </div>
            @endif
        </div>
        <hr class="w-100 ms-3">
    </div>
    <div hidden id="hidden_el_ins_id">{{$instructionid}}</div>
    <div hidden id="hidden_el_user_session_login">{{session('ruser')}}</div>
    <script src="{{asset('js/approval_change_ajax.js')}}"></script>
    <script src="{{asset('js/instruction_image_ajax.js')}}"></script>
    <script src="{{asset('js/complain_ajax.js')}}"></script>
    <script src="{{asset('js/delete_instruction_ajax.js')}}"></script>
@endsection
