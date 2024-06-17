<?php

namespace App\Interfaces;

interface FactorRepositoryInterface{
    public function getAll();
    public function addFactor($factor_number , $exp_date , $user_id);
    public function addFactorItem($factor_id , $product_id , $step_id , $date , $description);
}
