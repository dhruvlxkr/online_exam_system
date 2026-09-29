@extends('layout/layout-common')

@section('space-work')

<h1>Reset Password</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red">{{$error}}</p>
    @endforeach

@endif

<form action="{{route('postresetpassword')}}" method='post' enctype='multipart/form-data'>
    @csrf
     <input type="hidden" name="id" value="{{ $user->first()->id }}">
     <input type="password" name="password" placeHolder="Enter Your Password"> <br><br>
      <input type="password" name="password_confirmation" placeHolder="Enter Your Confirmation Password"><br><br>
     <input type="submit" Value="Reset Password" name="reset_password"> <br><br>
</form>