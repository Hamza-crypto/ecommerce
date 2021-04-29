@extends('layouts.app')

@section('title', 'Add User')

@section('content')
    <h1 class="h3 mb-3">Add Product</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if(session('add'))
                        <x-alert type="success">{{ session('add') }}</x-alert>
                    @endif

                    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x-input type="text" label="Title" placeholder="Enter product title"></x-input>
                        <x-input type="number" label="Price" placeholder="Enter price"></x-input>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" class="form-control select2 @error('category') is-invalid @enderror" name="category_id" data-toggle="select2">
                                <option value="-1">Select Category</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        @if(old('category') == $category->id) selected @endif
                                    >
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label w-100">Feature Image</label>
                            <input type="file" id="image" class="@error('image') is-invalid @enderror" name="product_image">

                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label for="description"> Description </label>
                            <textarea class="form-control" id="description" name="description" rows="4" > </textarea>

                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
