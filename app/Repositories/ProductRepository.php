<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface{
    public function addProduct($title)
    {
        // TODO: Implement addProduct() method.
        if(Product::where('title', $title)->exists()){
            return Product::where('title' , $title)->first()->product_id;
        }else{
            $product = new Product();
            $product->title = $title;
            if($product->save()){
                return $product->product_id;
            }
            return false;
        }
    }
}
