@extends('layouts.app')

@section('title', 'Users')

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#users-table').DataTable();
        });
    </script>
@endsection

@section('content')
    <h1 class="h3 mb-3">Users</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if(session('delete'))
                        <x-alert type="danger"> {{ session('delete') }}</x-alert>
                    @endif

                    <table id="users-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        {{ $product->title }}
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td> <img src="{{ $product->image }}" width="80px" height="60px"> </td>
                                    <td>{{ $product->category_id }}</td>
                                    <td>{{ $product->status }}</td>

                                    <td>{{ $product->created_at->diffForHumans() }}</td>
                                    <td class="table-action">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn" style="display: inline">
                                            <i class="fa fa-edit text-info"></i>
                                        </a>


                                            <form method="post" action="{{ route('products.destroy', $product->id) }}" style="display: inline">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn text-danger" href="{{ route('products.destroy', $product->id) }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
