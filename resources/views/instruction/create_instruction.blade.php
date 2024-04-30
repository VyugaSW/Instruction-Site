@extends('layouts.app')

@section('title','creating')

@section('content')
@if(session('ruser'))  
    @isset($success)
        @include('modalwindows.notifications.modalwindow_success',['message' => $success])
    @endif

    <form method="POST" enctype="multipart/form-data" action="/createInstruction/check">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Instruction Title:</label>
        <input type="text" class="form-control w-25 @error('name') is-invalid @enderror" id="inputLogin" placeholder="Title" name="name" value="{{session()->pull('name')}}">
        @error('name')<div id="nameHelp" class="form-text text-danger">{{$message}}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea type="text" class="form-control w-75 @error('description') is-invalid @enderror" id="inputLogin" placeholder="Description" name="description">{{session()->pull('description')}}</textarea>
        @error('description')<div id="descriptionHelp" class="form-text text-danger">{{$message}}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="imagecover" class="form-label">Choose image for Instruction:</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
        <input class="form-control w-75 @error('imagecover') is-invalid @enderror" type="file" id="imagecoverFile" name="imagecover" onchange="loadImageFile(this)">
        @error('imagecover')<div id="imagecoverHelp" class="form-text text-danger">{{$message}}</div>@enderror
        <img id="imagecoverResult" class="my-3 p-3 border border-success" style="width: 25rem">
    </div>
    <div class="mb-3">
        <label for="information" class="form-label">Information (main text): </label>
        <textarea type="text" class="form-control @error('information') is-invalid @enderror" id="inputLogin" placeholder="Information" name="information" style="height: 15rem">{{session()->pull('information')}}</textarea>
        @error('information') <div id="informationHelp" class="form-text text-danger">{{$message}}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="images[]" class="form-label">Choose images:</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
        <input class="form-control w-75 @error('images') is-invalid @enderror" type="file" id="images" name="images[]" onchange="loadImagesFile(this)" multiple>
        @error('images')<div id="imagesHelp" class="form-text text-danger">{{$message}}</div>@enderror
        <div id="imagesResult" class="d-flex my-3 p-3 border border-success gap-3 flex-wrap"></div>
    </div>
    <button class="btn btn-success fs-2 w-25">Create</button>
    </form>
    <script src="{{asset('js/creating_support.js')}}"></script>
@endif
@endsection
