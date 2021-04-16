@php
    $front_image = $user->documents->where('type', 'front_image')->pluck('filename')->first() ?? '';
    $back_image = $user->documents->where('type', 'back_image')->pluck('filename')->first() ?? '';
@endphp

<div class="tab-pane fade @if($tab == 'documents') show active @endif" id="documents" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Upload Documents</h5>
            <h6 class="card-subtitle text-muted">You can upload one of identity card, driving license or passport.</h6>
        </div>

        <div class="card-body">
            @if (session('documents'))
                <x-alert type="success">{{ session('documents') }}</x-alert>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('profile.documents') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="front_image" class="form-label w-100">Front Image</label>
                            <input type="file" id="front_image" class="@error('front_image') is-invalid @enderror" name="front_image">

                            @error('front_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="back_image" class="form-label w-100">Back Image</label>
                            <input type="file" id="back_image" class="@error('back_image') is-invalid @enderror" name="back_image">

                            @error('back_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Upload documents</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            @if (!empty($front_image))
                                <a href="{{ asset('storage/documents/' . $front_image) }}" class="image-link">
                                    <figure class="figure">
                                        <img src="{{ asset('storage/documents/' . $front_image) }}" class="figure-img img-fluid rounded" alt="Front Image">
                                        <figcaption class="figure-caption text-center">Front Image</figcaption>
                                    </figure>
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if (!empty($back_image))
                                <a href="{{ asset('storage/documents/' . $back_image) }}" class="image-link">
                                    <figure class="figure">
                                        <img src="{{ asset('storage/documents/' . $back_image) }}" class="figure-img img-fluid rounded" alt="Back Image">
                                        <figcaption class="figure-caption text-center">Back Image</figcaption>
                                    </figure>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
