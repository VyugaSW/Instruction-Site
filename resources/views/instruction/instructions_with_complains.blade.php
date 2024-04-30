@if(session('radmin'))

@extends('layouts.app')

@section('title','complains')

@section('content')
    @if(count($complains) == 0)
        <h3><span class="text-info">There are not any complains.</span></h3>
    @endif
    @foreach($complains as $c)
    <div class="row my-2">
        <div class="col-4">
            @include('instruction.instruction_draw',
                ['datePublished' => $c['instruction']['datePublished'],
                'name' => $c['instruction']['name'],
                'imagecover' => $c['instruction']['imagecover'],
                'description' => $c['instruction']['description'],
                'approvalid' => $c['instruction']['approvalid'],
                'user' => $c['instruction']['user'],
                'id' => $c['instruction']['id'],
                'userid' => $c['instruction']['userid']
                ])
        </div>
        <div class="col-4">
            <h4>Complain type: <span class="text-danger">{{$c['complainType']->type}}</span></h4>
            <h6>Complain description: <span>{{$c['description']}}</span></h6>
            <h7>Author of complain: <a href="/user?id={{$c['userid']}}" target="_blank">{{$c['userlogin']}}</a></h7>
            <hr>
            <button class="btn btn-warning" value="{{$c['complainid']}}" onclick="clearComplain(this.value)">Clear the complain</button>
        </div>
    </div>
    <hr>
    @endforeach
    <script src="{{asset('js/complain_clear_ajax.js')}}"></script>
@endsection

@endif