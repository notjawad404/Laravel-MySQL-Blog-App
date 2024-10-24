<x-guest-layout>
    <!-- Session Status -->
    <div class="mb-4 alert alert-info" role="alert">
        {{ session('status') }}
    </div>

    <form method="POST" action="{{ route('login') }}" class="w-75">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @if ($errors->has('email'))
                <div class="mt-2 text-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
            @if ($errors->has('password'))
                <div class="mt-2 text-danger">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            @if (Route::has('password.request'))
                <a class="text-decoration-underline small text-muted" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-primary ms-3">
                {{ __('Log in') }}
            </button>
            <a href="{{ route('register') }}" >Create a new Account.</a>
        </div>
    </form>
</x-guest-layout>
