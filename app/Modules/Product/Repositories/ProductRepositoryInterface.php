<?php

namespace App\Modules\Product\Repositories;

use Illuminate\Database\Eloquent\Model;

interface ProductRepositoryInterface
{
    public function getProductById(int $id): ?Model;

    public function getAllProducts(): array; 

    /**
     * Summary of createProduct
     * @param array<string, string> $data
     * @return ?Model
     */
    public function createProduct(array $data): ?Model;

    public function updateProduct(int $id, array $data): ?Model;

    public function deleteProduct(int $id, array $data): void;

    public function getProductsByUserId(int $userId): array;
}

