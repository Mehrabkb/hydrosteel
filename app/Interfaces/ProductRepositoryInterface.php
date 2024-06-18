<?php

namespace App\Interfaces;

interface ProductRepositoryInterface{
    public function addProduct($title);
    public function getProducts();
}
