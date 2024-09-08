@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Notifications</h2>

        @if($orders->isEmpty())
            <p>No orders available.</p>
        @else
            <ul class="list-group">
                @foreach($orders as $order)
                    <li class="list-group-item">
                        <strong>New Order Received:</strong> 
                        Order ID: {{ $order->id }}, Customer Name: {{ $order->customer_name }}, 
                        Placed on {{ $order->created_at->format('d/m/Y') }}.
                    </li>
                    <div class="modal-footer">
                                        <form action="{{ route('orders.markAsRead', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Mark as Read</button>
                                        </form>
                                    </div>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
