@extends('layout/layout-common')

@section('space-work')

<h1>Login</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red">{{$error}}</p>
    @endforeach

@endif

 @if(Session::has('error'))
    <p style="color:red">{{Session::get('error')}}</p>
  @endif

<form action="{{route('userLogin')}}" method='post' enctype='multipart/form-data'>
    @csrf
     <input type="email" name="email" placeHolder="Enter Your Email" required> <br><br>
     <input type="password" name="password" placeHolder="Enter Your Password" required> <br><br>
     <input type="submit" Value="Login" name="login"> <br><br>
</form>

 

@endsection