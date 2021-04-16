@extends('layouts.app')

@section('title', 'Edit User')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css" />
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.image-link').magnificPopup({type:'image'});
            $('.phone').intlTelInput({
                autoPlaceholder: 'polite',
                autoHideDialCode: true,
                nationalMode: false
            });
            $('#datetimepicker-date').datetimepicker({
                format: 'L'
            });
        });
    </script>
@endsection

@php
    $name = old("name", $user->name ?? '');
    $email = old("email", $user->email ?? '');
    $gender = old("gender", $user->gender() ?? '');
    $dob = old("dob", $user->dob() ?? '');
    $street_1 = old("street_1", $user->address->street_1 ?? '');
    $street_2 = old("street_2", $user->address->street_2 ?? '');
    $city = old("city", $user->address->city ?? '');
    $region = old("region", $user->address->region ?? '');
    $zipcode = old("zipcode", $user->address->zipcode ?? '');
    $phone = old('phone', $user->phone->number ?? '');
    $id_number = old("id_number", $user->tax->id_number ?? '');
    $state = old("state", $user->tax->state ?? '');
    $front_image = $user->documents->where('type', 'front_image')->pluck('filename')->first() ?? '';
    $back_image = $user->documents->where('type', 'back_image')->pluck('filename')->first() ?? '';
@endphp

@section('content')
    <h1 class="h3 mb-3">Edit User</h1>

    @if(session('edit'))
        <x-alert type="success">{{ session('edit') }}</x-alert>
    @endif

    <div class="row" data-masonry='{"percentPosition": true }'>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title">Account Basic</h5>

                        <div class="text-center">
                            @if (!empty($user->profile_picture()))
                                <img alt="{{ $user->name }}" src="{{ asset("storage/profiles/" . $user->profile_picture()) }}" class="rounded-circle img-responsive mt-2" width="128" height="128">
                            @else
                                <img alt="{{ $user->name }}" src="https://ui-avatars.com/api/?name={{ $user->name }}&background=293042&color=ffffff" class="rounded-circle img-responsive mt-2" width="128" height="128">
                            @endif
                        </div>

                        <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <x-input
                                type="text"
                                label="Name"
                                name="name"
                                placeholder="Enter user name"
                                :value="$name"
                            ></x-input>

                            <x-input
                                type="text"
                                label="Email"
                                name="email"
                                placeholder="Enter user email"
                                :value="$email"
                            ></x-input>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option>Select user gender</option>
                                    <option value="male" @if ($gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if ($gender == 'female') selected @endif>Female</option>
                                    <option value="other" @if ($gender == 'other') selected @endif>Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Date Only</label>
                                <div class="input-group date" id="datetimepicker-date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker-date" name="dob" value="{{ $dob }}" />
                                    <div class="input-group-append" data-target="#datetimepicker-date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="profile_picture" class="form-label w-100">Profile Picture</label>
                                <input type="file" id="profile_picture" class="@error('profile_picture') is-invalid @enderror" name="profile_picture">

                                @error('profile_picture')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <small class="form-text text-muted">For best results, use an image at least 128px by 128px in .jpg format</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Update account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title">Address</h5>

                        <form method="post" action="{{ route('users.address', $user->id) }}">
                            @csrf
                            @method('PATCH')

                            <x-input
                                type="text"
                                label="Street"
                                name="street_1"
                                placeholder="Enter user street"
                                :value="$street_1"
                            ></x-input>

                            <x-input
                                type="text"
                                label="Street 2"
                                name="street_2"
                                placeholder="Enter user street 2"
                                :value="$street_2"
                            ></x-input>

                            <div class="row">
                                <div class="col-md-6">
                                    <x-input
                                        type="text"
                                        label="City"
                                        name="city"
                                        placeholder="Enter user city"
                                        :value="$city"
                                    ></x-input>
                                </div>
                                <div class="col-md-6">
                                    <x-input
                                        type="text"
                                        label="Region"
                                        name="region"
                                        placeholder="Enter user region"
                                        :value="$region"
                                    ></x-input>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select id="country" class="form-control select2 @error('country') is-invalid @enderror" name="country" data-toggle="select2">
                                            <option value="">Select user country</option>
                                            @foreach($countries as $country_code => $country_name)
                                                <option
                                                    value="{{ $country_code }}"
                                                    @if(old('country') == $country_code) selected @endif
                                                    @if(isset($user->address))
                                                    @if ($user->address->country == $country_code) selected @endif
                                                    @endif
                                                >
                                                    {{ $country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <x-input
                                        type="text"
                                        label="Postal Code"
                                        name="zipcode"
                                        placeholder="Enter user postal code"
                                        :value="$zipcode"
                                    ></x-input>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update address</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title">Phone Number</h5>

                        <form method="post" action="{{ ) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="phone-number">Phone Number</label>
                                <div>
                                    <input type="tel" class="form-control phone" name="phone" value="{{  }}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update phone</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title">Tax Information</h5>

                        <form method="post" action="{{ ) }}">
                            @csrf
                            @method('PATCH')

                            <x-input
                                type="text"
                                label="ID Number"
                                name="id_number"
                                placeholder="Enter user tax id number"
                                :value="$id_number"
                            ></x-input>

                            <x-input
                                type="text"
                                label="State"
                                name="state"
                                placeholder="Enter user tax state"
                                :value="$state"
                            ></x-input>

                           

                            <button type="submit" class="btn btn-primary">Update tax information</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

       


        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title">Change Password</h5>

                        <form method="post" action="{{ route('users.password', $user->id) }}">
                            @csrf
                            @method('PATCH')

                            <x-input type="password" label="New Password" name="password" placeholder="Enter user new password"></x-input>
                            <x-input type="password" label="Confirm Password" name="password_confirmation" placeholder="Enter user password again"></x-input>

                            <button type="submit" class="btn btn-primary">Update password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
