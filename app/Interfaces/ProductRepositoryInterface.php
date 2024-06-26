<?php

namespace App\Interfaces;

interface ProductRepositoryInterface{
    public function addProduct($title);
    public function getProducts();
    public function getProductByProductId($productId);
    public function getProductCountAll();
}
