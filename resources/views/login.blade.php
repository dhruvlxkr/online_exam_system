<form id="formAuthentication" class="mb-4" action="{{ route('userLogin') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email or Username</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus required />
  </div>
  <div class="mb-3 form-password-toggle">
    <label class="form-label" for="password">Password</label>
    <div class="input-group input-group-merge">
      <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
      <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
    </div>
  </div>
  <div class="mb-3">
    <div class="d-flex justify-content-between">
      <div class="form-check mb-0">
        <input class="form-check-input" type="checkbox" id="remember-me" />
        <label class="form-check-label" for="remember-me"> Remember Me </label>
      </div>
      <a href="/forgot-password">
        <span>Forgot Password?</span>
      </a>
    </div>
  </div>
  <div class="mb-3">
    <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
  </div>
</form>

<p class="text-center mb-0">
  <span>New on our platform?</span>
  <a href="/register">
    <span>Create an account</span>
  </a>
</p>
