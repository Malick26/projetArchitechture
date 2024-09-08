<?php

namespace App\Modules\Order\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;


class OrderAdminController extends Controller
{
 /*   public function notifications()
    {
        $user = Auth::user();
        $notifications = $user->unreadNotifications;

        // Marquer toutes les notifications comme lues
        $user->unreadNotifications->markAsRead();

        // Retourner les notifications en JSON pour l'ajax
        return response()->json([
            'notifications' => $notifications->map(function ($notification) {
                return [
                    'data' => $notification->data,
                    'created_at' => $notification->created_at->toDateTimeString()
                ];
            })
        ]);
    } */
    public function notifications()
    {
        $user = Auth::user();
        $notifications = $user->notifications; // fetch all notifications

        return view('order::notifications', compact('notifications'));
    }

    public function index()
    {
        $orders = Order::latest()
                        ->where(function ($query) {
                            $query->where('read', '!=', 'yes')
                                  ->orWhereNull('read');
                        })
                        ->get();
    
        return view('order::notifications', compact('orders')); // Pass the orders to the view
    }
    
    public function markAsRead($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->update(['read' => 'yes']);
        }

        return redirect()->route('orders.notifications')
        ->with('success', 'Les commandes ont été marquées comme lues avec succès!');
    }

}

