<?php

namespace App\Modules\Order\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Modules\Users\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modules\Order\Controllers\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\OrderPlaced;
use Illuminate\Support\Facades\Notification;
use App\Modules\Order\Controllers\User;
use App\Notifications\SupplierAssignedNotification;

class OrderController extends Controller
{
    public function myOrders()
    {
        $user = Auth::user();

        $orders = Order::where('customer_id', $user->id)
            ->with('orderItems.product')
            ->get();

        return view('order::myorder', compact('orders'));
    }

    public function allOrders() {
        $orders = Order::all();

        return view('order::allorders', compact('orders'));
    }




    public function create()
    {
        // Récupérer tous les produits
        $products = \App\Models\Product::all();
        $admin = \App\Models\User::where('type', 'admin')->first();

        // Passer les produits à la vue
        return view('order::create', compact('products'));
    }
    public function store(Request $request)
{
    $admin = \App\Models\User::where('type', 'admin')->first();
    $data = $request->all();

    // Création de la commande
    $order = Order::create([
        'customer_id' => Auth::id(),  
    ]);

  
    foreach ($data['quantity'] as $productId => $quantity) {
        if ($quantity > 0 && isset($data['products'][$productId])) {
            $product = \App\Models\Product::findOrFail($productId);

           
            $order->orderItems()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price * $quantity,
            ]);

            
            $product->update([
                'stock' => $product->stock - $quantity,
            ]);
        }
    }

    
    $admin = Auth::user(); // assuming the admin is the logged-in user
    $admin->notify(new OrderPlaced($order));

    return redirect()->route('orders.create')->with('success', 'Commande ajoutée avec succès !');
}
    // public function store(Request $request)
    // {
    //     $data = $request->all();

    //     // Création de la commande
    //     $order = Order::create([
    //         'customer_id' => Auth::id(),  // Assurez-vous que le client est authentifié
    //     ]);

    //     // Ajout des produits à la commande
    //     foreach ($data['quantity'] as $productId => $quantity) {
    //         if ($quantity > 0 && isset($data['products'][$productId])) {
    //             $product = \App\Models\Product::findOrFail($productId);

    //             // Créer un nouvel élément de commande
    //             $order->orderItems()->create([
    //                 'product_id' => $product->id,
    //                 'quantity' => $quantity,
    //                 'price' => $product->price * $quantity,
    //             ]);

    //             // Mise à jour du stock du produit
    //             $product->update([
    //                 'stock' => $product->stock - $quantity,
    //             ]);
    //         }
    //     }

    //     return redirect()->route('orders.create')->with('success', 'Commande ajoutée avec succès !');
    // }

    public function downloadPdf($id)
    {
        // Récupérer la commande avec les détails
        $order = Order::with('orderItems.product')->findOrFail($id);

        // Générer le PDF
        $pdf = Pdf::loadView('order::invoice', compact('order'));

        // Télécharger le PDF
        return $pdf->download('invoice_' . $order->id . '.pdf');
    }

    public function show($id)
{
    $order = Order::with('orderItems.product')->findOrFail($id);
    $suppliers = \App\Models\User::where('role', 'supplier')->get(); // Récupérer les fournisseurs

    return view('order::show', compact('order', 'suppliers'));
}

// public function assignSupplier(Request $request, $id)
// {
//     $order = Order::findOrFail($id);
//     $order->supplier_id = $request->input('supplier_id');
//     $order->save();

//     // Notifier le fournisseur
//     $supplier = \App\Models\User::find($order->supplier_id);
//     $supplier->notify(new \App\Notifications\OrderAssigned($order));

//     return redirect()->back()->with('success', 'Fournisseur assigné avec succès !');
// }
public function assignSupplier(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->supplier_id = $request->input('supplier_id');
    $order->save();

    // Optionnel : Envoyer une notification au fournisseur
    $supplier = \App\Models\User::find($request->input('supplier_id'));
    Notification::send($supplier, new SupplierAssignedNotification($order));

    return redirect()->route('orders.show', $id)->with('success', 'Supplier assigned successfully.');
}


}
