<?php
namespace App\Modules\Order\Repositories;

use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{
    public function getOrderById(int $id): ?Model;

    public function getAllOrder(): array;

    public function createOrder(array $data): ?Model;

    public function updateOrder(int $id, array $data): ?Model;

    public function deleteOrder(int $id): void;

    public function getOrderByType(string $type): array;
}
