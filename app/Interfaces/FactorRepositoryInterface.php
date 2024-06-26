<?php

namespace App\Interfaces;

interface FactorRepositoryInterface{
    public function getAll();
    public function addFactor($factor_number , $exp_date , $user_id);
    public function addFactorItem($factor_id , $product_id , $step_id , $date , $description);
    public function getFactorById($factor_id);
    public function getFullFactorDataById($factor_id);
    public function getFactorItemsByFactorId($factor_id);
    public function updateFactor($factor_item_id , $step_id , $date , $description);
    public function getFactorItemByFactorItemId($factor_item_id);
    public function getFactorByFactorNumber($factor_number );
    public function getFactorCountAll();
    public function deleteFactorByFactorId($factor_id);
    public function deleteFactorItemsByFactorId($factor_id);
    public function deleteFactorItemByFactorItemId($factor_item_id);
}
