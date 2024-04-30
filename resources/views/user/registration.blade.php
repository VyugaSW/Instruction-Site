@extends('layouts.app')

@section('title','registration')

@section('content')
@if($errors->any() && count($errors->all()) > 0)
    @include('modalwindows.notifications.modalwindow_errors',$errors->all())
@endif
  
@isset($success)
  @include('modalwindows.notifications.modalwindow_success',['message' => $success])
@endif

<form method="POST" enctype="multipart/form-data" action="/registration/check">
  @csrf
  <div class="mb-3">
    <label for="login" class="form-label">Login:</label>
    <input type="text" class="form-control" id="inputLogin" name="login">
    <div id="loginHelp" class="form-text text-danger"></div>
  </div>
  <div class="mb-3">
    <label for="password1" class="form-label">Password:</label>
    <input type="password" class="form-control" id="inputPassword1" name="password1">
    <div id="password1Help" class="form-text text-danger"></div>
  </div>
  <div class="mb-3">
    <label for="password2" class="form-label">Confirm Password:</label>
    <input type="password" class="form-control" id="inputPassword2" name="password2">
    <div id="password2Help" class="form-text text-danger"></div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="inputEmail" name="email">
    <div id="emailHelp" class="form-text text-danger"></div>
  </div>
  <div class="mb-3">
   <label for="avatar" class="form-label">Choose Avatar:</label>
   <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
   <input class="form-control" type="file" id="formFile" name="avatar">
  </div>
  <button type="submit" class="btn btn-primary" name="btnreg" id="regbtn">Register</button>
</form>
<script src="{{asset('js/registration_support.js')}}"></script>
@endsection