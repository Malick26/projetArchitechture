@extends('layouts.admin')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('content')
<div class="container">
    <h2>Add New Order</h2>
    <a href="{{ route('myorders') }}" class="btn btn-primary">Voir mes commandes</a>

    <form action="{{ route('orders.store') }}" method="POST" id="order-form">
        @csrf
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Stock: {{ $product->stock }}</p>
                            <p class="card-text">Price: {{ $product->price }} $</p>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" name="products[{{ $product->id }}]" id="product_{{ $product->id }}" class="form-check-input" data-price="{{ $product->price }}" data-stock="{{ $product->stock }}">
                                    <label for="product_{{ $product->id }}" class="form-check-label">Ajouter à la commande</label>
                                </div>

                                {{-- <div class="form-group mt-2" id="quantity-group-{{ $product->id }}" style="display: none;">
                                    <label for="quantity_{{ $product->id }}">Quantity:</label>
                                    <input type="number" name="quantity[{{ $product->id }}]" id="quantity_{{ $product->id }}" class="form-control" min="1" max="{{ $product->stock }}" value="1">
                                </div> --}}
                                <div class="form-group">
                                    <label for="quantity_{{ $product->id }}">Quantity:</label>
                                    <input type="number" name="quantity[{{ $product->id }}]" id="quantity_{{ $product->id }}" class="form-control" min="1" max="{{ $product->stock }}" value="1">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Commander</button>
    </form>
</div>

@endsection

@section('scripts')
<script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    // Fonction pour calculer le total en fonction des quantités sélectionnées
    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('input[name^="quantity"]').forEach(function(input) {
            let quantity = parseInt(input.value);
            let pricePerUnit = parseFloat(input.closest('.card-body').querySelector('input[type="checkbox"]').dataset.price);
            if (!isNaN(quantity) && quantity > 0) {
                total += quantity * pricePerUnit;
            }
        });
        document.getElementById('total-price').innerText = total.toFixed(2);
    }

    // Événement sur les cases à cocher pour afficher ou cacher les champs de quantité
    document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var productId = this.id.replace('product_', '');
            var quantityGroup = document.getElementById('quantity-group-' + productId);
            if (this.checked) {
                quantityGroup.style.display = 'block';
            } else {
                quantityGroup.style.display = 'none';
                document.getElementById('quantity_' + productId).value = '';
            }
            calculateTotal(); // Recalculer le total lorsque l'état de la case change
        });
    });

    // Événement sur les champs de quantité pour recalculer le total en temps réel
    document.querySelectorAll('input[name^="quantity"]').forEach(function(input) {
        input.addEventListener('input', calculateTotal);
    });

    // Affichage des messages de succès
    @if(session('success'))
        Swal.fire({
            title: 'Succès',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endsection
