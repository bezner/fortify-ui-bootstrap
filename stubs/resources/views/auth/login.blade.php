@extends('layouts.auth')

@section('content')
    @if (session('status'))
        <div class="container">
            <div class="row">
                <div class="col">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>{{ __('Whoops! Something went wrong.') }}</p>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="d-flex justify-content-center my-3">
                    <img src="{{ asset('images/bootstrap-5-logo.svg') }}" alt="Powered by Bootstrap 5" class="w-25 mx-auto px-3">
                </div>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mt-3">
                                <label>{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus />
                            </div>

                            <div class="mt-3">
                                <label>{{ __('Password') }}</label>
                                <input type="password" class="form-control" name="password" required autocomplete="current-password" />
                            </div>

                            <div class="mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember-me-checkbox">
                                    <label class="form-check-label" for="remember-me-checkbox">
                                        {{ __('Remember me') }}
                                    </label>
                                </div>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="d-inline-block mt-3">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
