@extends('layouts.app')

@section('title','Approving')

@section('content')
@if(session('radmin'))
<div class="col-lg-4 col-md-4 col-sm-4">
    <div class="row">
        <div class="col-4">
            <div class="btn-group-vertical" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="inclTitle" autocomplete="off" name="inclTitle" checked="true">
                <label class="btn btn-outline-primary" for="inclTitle">Include title</label>
        
                <input type="checkbox" class="btn-check" id="inclDescription" autocomplete="off" name="inclDescription">
                <label class="btn btn-outline-primary" for="inclDescription">Include Description</label>
        
                <input type="checkbox" class="btn-check" id="inclAuthor" autocomplete="off" name="inclAuthor">
                <label class="btn btn-outline-primary" for="inclAuthor">Include Author</label>
            </div>
        </div>
        <div class="col-8">
            <h7 class="text-info">Search definitely instruction</h7>
            <div class="input-group">
                <input class="form-control w-50" type="search" placeholder="Search" aria-label="Search" name="instructionSearch">
                <button class="btn btn-outline-success" type="submit" name="btnSearch" 
                        onclick="search('/approving/request','0',document.getElementById('resultSearching'))">Search</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-4 column-gap-4 row-gap-1 mb-5 justify-content-center" id="resultSearching"></div>
</div>
<div class="col-lg-1 col-md-1 col-sm-1">
    <div class="vr h-100"></div>
</div>
<div class="col-lg-7 col-md-7 col-sm-7 row mt-4">
    <h4 class="mb-4">Instructions for approving:</h4>
    <div class="gap-4 mb-5 d-flex flex-wrap" id="result_waiting_insts"></div>
</div>
<script src="{{asset('js/search_ajax.js')}}"></script>
<script>search('/approving/get','2',document.getElementById('result_waiting_insts'),true)</script>
@endif
@endsection