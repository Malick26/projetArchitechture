<?php
namespace App\Modules\Product\Services;

use App\Models\Product;
use App\Modules\Product\Repositories\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ProductRepositoryInterface
{
    public function getProductById(int $id): ?Model
    {
        return Product::find($id);
    }

    public function getAllProducts(): array
    {
        return Product::all()->toArray(); // Assurez-vous que ce nom correspond à l'interface
    }

    public function createProduct(array $data): ?Model
    {
        return Product::create($data);
    }

    public function updateProduct(int $id, array $data): ?Model
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public function deleteProduct(int $id, array $data): void
    {
  
        Product::where('id', $id)->delete();
    }

    public function getProductsByUserId(int $userId): array
    {
        return Product::where('supplier_ref', $userId)->get()->toArray();
    }
}
