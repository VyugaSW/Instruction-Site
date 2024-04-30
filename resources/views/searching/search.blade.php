@extends('layouts.app')

@section('title','search')

@section('content')
<div class="row">
    <div>
        <div class="input-group">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="instructionSearch">
            <button class="btn btn-outline-success" type="submit" name="btnSearch" onclick="search('/search/request','1',document.getElementById('result'))">Search</button>
        </div>
        <div class="btn-group mt-1" aria-label="Basic checkbox toggle button group" style="width:60%">
            <input type="checkbox" class="btn-check" id="inclTitle" autocomplete="off" name="inclTitle" checked="true">
            <label class="btn btn-outline-primary" for="inclTitle">Include title</label>

            <input type="checkbox" class="btn-check" id="inclDescription" autocomplete="off" name="inclDescription">
            <label class="btn btn-outline-primary" for="inclDescription">Include Description</label>
    
            <input type="checkbox" class="btn-check" id="inclAuthor" autocomplete="off" name="inclAuthor">
            <label class="btn btn-outline-primary" for="inclAuthor">Include Author</label>
        </div>
    </div>
    <div class="row mt-4 column-gap-4 row-gap-1 mb-5" id="result"></div>
</div>
<script src="{{asset('js/search_ajax.js')}}"></script>
@endsection