@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Mes Commandes</h2>

    @if($orders->isEmpty())
        <p>Vous n'avez pas encore passé de commande.</p>
    @else
        @foreach($orders as $order)
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Commande #{{ $order->id }} - Passée le {{ $order->created_at->format('d/m/Y H:i') }}</strong>
                </div>
                <div class="card-body">
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
                            <!-- Autres détails de la commande -->
                            <a href="{{ route('orders.downloadPdf', $order->id) }}" class="btn btn-primary">Télécharger la Facture</a>

                    </table>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
