@extends('layouts.admin')

@section('content')
@include('main')
<div class="container">
    <h2>User Management</h2>
    <!-- Button to Add New User -->
    <div class="d-flex justify-content-end mb-3"></div>
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
                    <!-- Add to Cart Button -->
                    <p class="btn-holder"><button class="btn btn-outline-danger add-to-cart" data-product-id="{{ $u['id'] }}">Add to cart</button></p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(".add-to-cart").click(function (e) {
        e.preventDefault();

        var productId = $(this).data("product-id");
        var productQuantity = $(this).siblings(".product-quantity").val();
        var cartItemId = $(this).data("cart-item-id");

        $.ajax({
            url: "{{ route('add-movie-to-shopping-cart') }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                quantity: productQuantity,
                cart_item_id: cartItemId
            },
            success: function (response) {
                $('#cart-quantity').text(response.cartCount);
                 alert('Cart Updated');
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Handle errors (e.g., display an error message)
                console.error(xhr.responseText);
            }
        });
    });
</script>
@endsection
