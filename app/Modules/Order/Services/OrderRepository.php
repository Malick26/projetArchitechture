<?php

namespace App\Modules\Order\Services;

use App\Models\Order;
use App\Modules\Order\Repositories\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements OrderRepositoryInterface
{
    public function getOrderById(int $id): ?Model
    {
        return Order::find($id);
    }

    public function getAllOrder(): array
    {
        return Order::all()->toArray();
    }

    public function createOrder(array $data): ?Model
    {
        return Order::create($data);
    }

    public function updateOrder(int $id, array $data): ?Model
    {
        $order = Order::find($id);
        if ($order) {
            $order->update($data);
            return $order;
        }
        return null;
    }

    public function deleteOrder(int $id): void
    {
        Order::destroy($id);
    }

    public function getOrderByType(string $type): array
    {
        return Order::where('type', $type)->get()->toArray();
    }
}
