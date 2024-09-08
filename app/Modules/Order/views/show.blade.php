@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Détails de la Commande #{{ $order->id }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Sous-total</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} CFA</td>
                    <td>{{ number_format($item->price * $item->quantity, 2) }} CFA</td>
                </tr>
                @php $total += $item->price * $item->quantity; @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-right">Total :</th>
                <th>{{ number_format($total, 2) }} CFA</th>
            </tr>
        </tfoot>
    </table>

    <form action="{{ route('orders.assignSupplier', $order->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="supplier">Assign Supplier:</label>
            <select name="supplier_id" id="supplier" class="form-control" required>
                <option value="">Select a supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Assign</button>
    </form>
</div>
@endsection
