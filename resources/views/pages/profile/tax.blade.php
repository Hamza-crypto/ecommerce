@php
    $id_number = old("id_number", $user->tax->id_number ?? '');
    $state = old("state", $user->tax->state ?? '');
@endphp

<div class="tab-pane fade @if($tab == 'tax') show active @endif" id="tax" role="tabpanel">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tax Information</h5>

            @if (session('tax'))
                <x-alert type="success">{{ session('tax') }}</x-alert>
            @endif

            <form method="post" action="{{ route('profile.tax') }}">
                @csrf

                <x-input
                    type="text"
                    label="ID Number"
                    name="id_number"
                    placeholder="Enter your tax id number"
                    :value="$id_number"
                ></x-input>

                <x-input
                    type="text"
                    label="State"
                    name="state"
                    placeholder="Enter your tax state"
                    :value="$state"
                ></x-input>

                <div class="form-group">
                    <label for="tax_country">Country</label>
                    <select id="tax_country" class="form-control select2 @error('country') is-invalid @enderror" name="country" data-toggle="select2">
                        <option value="-1">Select your country</option>
                        @foreach($countries as $country)
                            <option
                                value="{{ $country->country_code }}"
                                @if(old('country') == $country->country_code) selected @endif
                                @if(isset($user->tax))
                                    @if ($user->tax->country == $country->country_code) selected @endif
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

                <button type="submit" class="btn btn-primary">Update tax information</button>
            </form>
        </div>
    </div>
</div>
