@extends('layout.auth-layout')

@section('title', 'Register')

@section('content')
<h5 class="mb-3 text-center">Register</h5>

<form id="formAuthentication" class="mb-4" action="{{ route('studentregister') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Username</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" autofocus required />
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required />
  </div>
  <div class="form-password-toggle mb-3">
    <label class="form-label" for="password">Password</label>
    <div class="input-group input-group-merge">
      <input type="password" name="password" id="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
      <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
    </div>
  </div>

  <div class="form-password-toggle mb-3">
    <label class="form-label" for="password_confirmation">Confirm Password</label>
    <div class="input-group input-group-merge">
      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
      <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-check mb-0">
      <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
      <label class="form-check-label" for="terms-conditions">
        I agree to
        <a href="javascript:void(0);">privacy policy & terms</a>
      </label>
    </div>
  </div>
  <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
</form>

<p class="text-center mb-0">
  <span>Already have an account?</span>
  <a href="/login">
    <span>Sign in instead</span>
  </a>
</p>
@endsection
