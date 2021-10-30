@extends('layouts.app')

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
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

                            <div class="mt-3">
                                <label>{{ __('Email') }}</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus />
                            </div>

                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
