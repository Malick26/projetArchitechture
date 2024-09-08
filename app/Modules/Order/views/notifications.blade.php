@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Notifications</h2>

        @if($orders->isEmpty())
            <p>No orders available.</p>
        @else
            <ul class="list-group">
                @foreach($orders as $order)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>New Order Received:</strong> 
                            Order ID: {{ $order->id }}, Customer Name: {{ $order->customer_name }}, 
                            Placed on {{ $order->created_at->format('d/m/Y') }}.
                        </div>
                        <form action="{{ route('orders.markAsRead', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Mark as Read</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
