@extends('layout/layout-common')

@section('space-work')

<h1>Register For Exam</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red">{{$error}}</p>
    @endforeach

@endif

<form action="{{route('studentregister')}}" method='post' enctype='multipart/form-data'>
    @csrf
     <input type="text" name="name" placeHolder="Enter Your Name" required> <br><br>
     <input type="email" name="email" placeHolder="Enter Your Email" required> <br><br>
     <input type="password" name="password" placeHolder="Enter Your Password" required> <br><br>
     <input type="password" name="password_confirmation" placeHolder="Confirm Your Password" required> <br><br>
     <input type="submit" Value="Register" name="register"> <br><br>
</form>

  @if(Session::has('success'))
    <p style="color:green">{{Session::get('success')}}</p>
  @endif

@endsection