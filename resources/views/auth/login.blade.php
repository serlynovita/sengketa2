@extends('layouts.base_auth')

@section('auth_content')
<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}" id="form_login">
            @csrf
              <h1 style="font-size:22px;">Login Portal Sengketa</h1>
              <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
              </div>
              <div>
                <a class="btn btn-default submit" onclick="document.getElementById('form_login').submit()">Log in</a>
                @if (Route::has('password.request'))
                <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
                @endif
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  @if (Route::has('register'))
                    <a href="{{ route('register') }}"> Create Account </a>
                  @endif
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                    <br>
                    <br>
                    <br>
                  {{-- <h1><i class="fa fa-users"></i> Portal Pengaduan Sengketa</h1> --}}
                  <p>©2024 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
@endsection
