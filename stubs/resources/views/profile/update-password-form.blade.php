@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="d-flex justify-content-center my-3">
                    <img src="{{ asset('images/bootstrap-5-logo.svg') }}" alt="Powered by Bootstrap 5" class="w-25 mx-auto px-3">
                </div>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('user-password.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="mt-3">
                                <label>{{ __('Current Password') }}</label>
                                <input type="password" name="current_password" class="form-control" required autocomplete="current-password" />
                            </div>

                            <div class="mt-3">
                                <label>{{ __('Password') }}</label>
                                <input type="password" name="password" class="form-control" required autocomplete="new-password" />
                            </div>

                            <div class="mt-3">
                                <label>{{ __('Confirm Password') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password" />
                            </div>

                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
