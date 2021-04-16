@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="text-center">
        <h1 class="display-1 font-weight-bold">401</h1>
        <p class="h1">Verify Email Address</p>
        <p class="h2 font-weight-normal mt-3 mb-4">We have send an email, please click the link included to verify your email address.</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
        <form method="post" action="{{ route('verification.send') }}" style="display: inline;">
            @csrf

            <button type="submit" class="btn btn-primary btn-lg">Resend Email</button>
        </form>
    </div>
@endsection
