
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="/css/loginstyle.css" rel="stylesheet" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <h1>Login</h1>
    <h2>Wash n Dry</h2>
    <p>Laundry Monitoring <br> Services</p>
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div>
        <input id="email" type="email" class="custom-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div>
        <input id="password" type="password" class="custom-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <!--<div class="remember-me">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
      </div>-->

      <p class="recover">
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">{{ __('Recover Password') }}</a>
        @endif
      </p>
      
      <button type="submit">Login</button>
    </form>

    <div class="not-member">
    Not a member? <a href="{{ route('register') }}">Register here</a>
    </div>
  </div>
</body>
</html>


