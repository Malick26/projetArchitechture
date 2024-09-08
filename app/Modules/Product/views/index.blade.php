@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>User Management</h2>
    <!-- Button to Add New User -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
  
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th> Name</th>
                <th> Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $u)
            <tr>
                <td>{{ $u['id'] }}</td>
                <td>{{ $u['name'] }}</td>
                <td>{{ $u['price'] }}</td>
                <td>{{ $u['stock'] }}</td>              
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('products.edit', $u['id']) }}" class="btn btn-primary">Edit</a>

                    <!-- Delete Form -->
                    <form action="{{ route('products.destroy', $u['id']) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
