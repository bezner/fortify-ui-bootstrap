@extends('layouts.app')

@section('content')
    @if (session('status') == 'verification-link-sent')
        <div class="container">
            <div class="row">
                <div class="col">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
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
                        <p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Logout') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
