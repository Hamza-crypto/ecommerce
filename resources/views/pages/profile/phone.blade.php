@php
    $phone = old('phone', $user->phone->number ?? '');
@endphp

<div class="tab-pane fade @if($tab == 'phone' || session('phone') || session('verify')) show active @endif" id="phone" role="tabpanel">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Phone Number</h5>

            @if (session('danger'))
                <x-alert type="danger">{{ session('danger') }}</x-alert>
            @endif

            @if (session('phone'))
                <x-alert type="warning">{{ session('phone') }}</x-alert>
            @endif

            @if (session('verify'))
                <x-alert type="success">{{ session('verify') }}</x-alert>
            @endif

            @if (session('phone'))
                <form method="post" action="{{ route('profile.verify') }}">
                    @csrf

                    <x-input
                        type="text"
                        label="Code"
                        name="code"
                        placeholder="Enter your verification code"
                    ></x-input>

                    <button type="submit" class="btn btn-primary">Verify Code</button>
                </form>
            @else
                <form method="post" action="{{ route('profile.phone') }}">
                    @csrf

                    <div class="form-group">
                        <label for="phone-number">Phone Number</label>
                        <div>
                            <input type="tel" class="form-control phone" name="phone" value="{{ $phone }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update phone</button>
                </form>
            @endif
        </div>
    </div>
</div>
