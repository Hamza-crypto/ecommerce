@php
    $name = old("name", $user->name ?? '');
    $gender = old("gender", $user->gender() ?? '');
    $dob = old("dob", $user->dob() ?? '');
@endphp

<div class="tab-pane fade @if($tab == 'account') show active @endif" id="account" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Basic Info</h5>
        </div>
        <div class="card-body">
            @if (session('account'))
                <x-alert type="success">{{ session('account') }}</x-alert>
            @endif

            <form method="post" action="{{ route('profile.account') }}" enctype="multipart/form-data">
                @csrf

                <x-input
                    type="text"
                    label="Name"
                    name="name"
                    placeholder="Enter your name"
                    :value="$name"
                ></x-input>

                <x-input
                    type="text"
                    label="Email"
                    name="email"
                    placeholder="Enter your email"
                    :value="$user->email"
                    disabled="disabled"
                ></x-input>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option>Select your gender</option>
                        <option value="male" @if ($gender == 'male') selected @endif>Male</option>
                        <option value="female" @if ($gender == 'female') selected @endif>Female</option>
                        <option value="other" @if ($gender == 'other') selected @endif>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="dob">Date of Birth</label>
                    <div class="input-group date" id="datetimepicker-date" data-target-input="nearest">
                        <input type="text" id="dob" class="form-control datetimepicker-input" data-target="#datetimepicker-date" name="dob" value="{{ $dob }}" required/>
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
