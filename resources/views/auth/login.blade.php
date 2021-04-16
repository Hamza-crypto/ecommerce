@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="text-center mt-4">
        <h1 class="h2">Login</h1>
        <p class="lead">
            Login to your account to continue
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">
                @if (session('status'))
                    <x-alert type="success">{{ session('status') }}</x-alert>
                @endif

                @if (session('warning'))
                    <x-alert type="success">{{ session('warning') }}</x-alert>
                @endif

                <form method="post" action="{{ route('login') }}">
                    @csrf

                    <x-input type="email" label="Email" placeholder="Enter your email"></x-input>
                    <x-input type="password" label="Password" placeholder="Enter your password">
                        <small>
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </small>
                    </x-input>

                    <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" class="custom-control-input" name="remember" checked>
                        <span class="custom-control-label">Remember me next time</span>
                    </label>

                    <div class="text-center mt-3">
                        <button
                            type="submit"
                            class="btn btn-lg btn-primary"
                        >
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
