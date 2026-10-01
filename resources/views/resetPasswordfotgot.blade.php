<h5 class="mb-2">Reset Password? 🔒</h5>
<p class="mb-4 text-muted">Please enter your new password below.</p>

<form id="formAuthentication" class="mb-4" action="{{ route('postresetpassword') }}" method="POST">
  @csrf
  <input type="hidden" name="id" value="{{ isset($user->id) ? $user->id : ($user->first()->id ?? '') }}" />

  <div class="mb-3 form-password-toggle">
    <label for="password" class="form-label">New Password</label>
    <div class="input-group input-group-merge">
      <input
        type="password"
        class="form-control"
        id="password"
        name="password"
        placeholder="Enter Your Password"
        required
        autofocus />
      <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
    </div>
  </div>

  <div class="mb-3 form-password-toggle">
    <label for="password_confirmation" class="form-label">Confirm Password</label>
    <div class="input-group input-group-merge">
      <input
        type="password"
        class="form-control"
        id="password_confirmation"
        name="password_confirmation"
        placeholder="Confirm Your Password"
        required />
      <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
    </div>
  </div>

  <button type="submit" name="reset_password" class="btn btn-primary d-grid w-100">Reset Password</button>
</form>

<div class="text-center mb-0">
  <a href="/login" class="d-flex align-items-center justify-content-center">
    <i class="icon-base bx bx-chevron-left me-1"></i>
    Back to login
  </a>
</div>
