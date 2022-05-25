<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header font-proximanova">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Deze gegevens onthouden') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn--inline btn--orange">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <div class="mt-3 text-center">
                                    <a class="support-link btn--inline" href="{{ route('password.request') }}">
                                        {{ __('Wachtwoord vergeten?') }}
                                    </a>
                                </div>    
                                <div class="text-center mt-3 text-base">
                                <p class="text-base">{{ __('Nog geen account?') }} <button id="register-trigger" class="font-bold">{{ __('Register') }}</button></p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
