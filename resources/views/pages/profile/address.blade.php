@php
    $street_1 = old("street_1", $user->address->street_1 ?? '');
    $street_2 = old("street_2", $user->address->street_2 ?? '');
    $city = old("city", $user->address->city ?? '');
    $region = old("region", $user->address->region ?? '');
    $zipcode = old("zipcode", $user->address->zipcode ?? '');
@endphp

<div class="tab-pane fade @if($tab == 'address') show active @endif" id="address" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Address</h5>
        </div>
        <div class="card-body">
            @if (session('address'))
                <x-alert type="success">{{ session('address') }}</x-alert>
            @endif

            <form method="post" action="{{ route('profile.address') }}">
                @csrf

                <x-input
                    type="text"
                    label="Street"
                    name="street_1"
                    placeholder="Enter your street"
                    :value="$street_1"
                ></x-input>

                <x-input
                    type="text"
                    label="Street 2"
                    name="street_2"
                    placeholder="Enter your street 2"
                    :value="$street_2"
                ></x-input>

                <div class="row">
                    <div class="col-md-6">
                        <x-input
                            type="text"
                            label="City"
                            name="city"
                            placeholder="Enter your city"
                            :value="$city"
                        ></x-input>
                    </div>
                    <div class="col-md-6">
                        <x-input
                            type="text"
                            label="Region"
                            name="region"
                            placeholder="Enter your region"
                            :value="$region"
                        ></x-input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select id="country" class="form-control select2 @error('country') is-invalid @enderror" name="country" data-toggle="select2">
                                <option value="-1">Select your country</option>
                                @foreach($countries as $country)
                                    <option
                                        value="{{ $country->country_code }}"
                                        @if(old('country') == $country->country_code) selected @endif
                                        @if(isset($user->address))
                                            @if ($user->address->country == $country->country_code) selected @endif
                                        @endif
                                    >
                                        {{ $country->country_name }}
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
                            placeholder="Enter your postal code"
                            :value="$zipcode"
                        ></x-input>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update address</button>
            </form>
        </div>
    </div>
</div>
