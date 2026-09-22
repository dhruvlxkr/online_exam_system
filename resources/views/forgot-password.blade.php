@extends('layout/layout-common')

@section('space-work')

<h1>Forgot Password</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red">{{$error}}</p>
    @endforeach

@endif

 @if(Session::has('error'))
    <p style="color:red">{{Session::get('error')}}</p>
  @endif


 @if(Session::has('success'))
    <p style="color:green">{{Session::get('success')}}</p>
  @endif

<form action="{{route('reset-password')}}" method='post' enctype='multipart/form-data'>
    @csrf
     <input type="email" name="email" placeHolder="Enter Your Email" required> <br><br>
     <input type="submit" Value="Forget Password" name="Forget_password"> <br><br>
</form>

<a href="/">Login</a>