<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;
// use Maatwebsite\Excel\Concerns\FromCollection;

class Products implements FromArray
{
    public function array(): array
    {
        $list = [];
        $products = Product::all();
        foreach ($products as $product) {
            $list[] = [
                $product->category_id, $product->name, $product->price,
                $product->compare_price, $product->description, $product->status,
                $product->quantity
            ];
        }
        return $list;
    }
}
