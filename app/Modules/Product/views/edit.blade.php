@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Product</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{route('products.update',$product->id)  }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" required>
        </div>
        <div class="form-group mb-3">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{$product->price}}" required>
        </div>
        <div class="form-group mb-3">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{$product->stock}}" required>
        </div>      
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
