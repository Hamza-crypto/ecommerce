@extends('layouts.app')

@section('title', 'Add User')

@section('content')
    <h1 class="h3 mb-3">Add User</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if(session('add'))
                        <x-alert type="success">{{ session('add') }}</x-alert>
                    @endif

                    <form method="post" action="{{ route('users.store') }}">
                        @csrf

                        <x-input type="text" label="Name" placeholder="Enter your name"></x-input>
                        <x-input type="email" label="Email" placeholder="Enter your email"></x-input>
                        <x-input type="password" label="Password" placeholder="Enter your password"></x-input>
                        <x-input type="password" label="Confirm Password" name="password_confirmation" placeholder="Enter your password again"></x-input>

                        <button type="submit" class="btn btn-lg btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
