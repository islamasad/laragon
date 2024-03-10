@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="bg-light d-flex vh-100 align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-4">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('img/ui/building.svg') }}" alt="Building" class="img-fluid small-svg mb-3">
                        <h1>KOSMIN</h1>
                        <p>Welcome Back!</p>
                    </div>    
                    <div class="card border-0 mt-2">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login.post') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="username">{{ __('Username') }}</label>
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                </div>

                                <div class="form-group mb-3">
                                    <label for "password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>

                                <div class="d-grid gap-2 d-md-block">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                                @if ($showRegisterButton)
                                
                                <a class="btn btn-light custom-btn mt-1" tabindex="-1" role="button" href="{{ route('register') }}" style="border: none;">
                                    Register
                                </a>
                                @endif
                                @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    {{ __('Login Failed') }}
                                </div>
                                @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection