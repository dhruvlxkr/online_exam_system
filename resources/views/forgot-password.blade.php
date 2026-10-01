@extends('layout.auth-layout')

@section('title', 'Forgot Password')

@section('content')
<h5 class="mb-2">Forgot Password? 🔒</h5>
<p class="mb-4 text-muted">Enter your email and we'll send you a link to reset your password.</p>

<form class="mb-4" action="{{ route('reset-password') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required autofocus />
  </div>
  <button class="btn btn-primary d-grid w-100" type="submit">Send Reset Link</button>
</form>

<div class="text-center mb-0">
  <a href="/login" class="d-flex align-items-center justify-content-center">
    <i class="icon-base bx bx-chevron-left me-1"></i>
    Back to login
  </a>
</div>
@endsection
