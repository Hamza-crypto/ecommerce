@extends('layouts.auth')

@section('title', 'Reset password')

@section('content')
    <div class="text-center mt-4">
        <h1 class="h2">Reset password</h1>
        <p class="lead">
            Enter your new password
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">
                @if (session('status'))
                    <x-alert type="success">{{ session('status') }}</x-alert>
                @endif

                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ request()->input('email') }}">
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

                    <x-input type="password" label="Password" placeholder="Enter your password"></x-input>
                    <x-input type="password" label="Confirm Password" name="password_confirmation" placeholder="Enter your password again"></x-input>

                    <div class="text-center mt-3">
                        <button
                            type="submit"
                            class="btn btn-lg btn-primary"
                        >
                            Reset password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
