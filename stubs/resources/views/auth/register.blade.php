@extends('layouts.auth')

@section('content')
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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mt-3">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required autofocus autocomplete="name" />
                            </div>

                            <div class="mt-3">
                                <label>{{ __('Email') }}</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required />
                            </div>

                            <div class="mt-3">
                                <label>{{ __('Password') }}</label>
                                <input type="password" name="password" class="form-control" required autocomplete="new-password" />
                            </div>

                            <div class="mt-3">
                                <label>{{ __('Confirm Password') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password" />
                            </div>

                            <a href="{{ route('login') }}" class="d-inline-block mt-3">
                                {{ __('Already registered?') }}
                            </a>

                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
