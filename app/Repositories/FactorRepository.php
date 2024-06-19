<?php

namespace App\Repositories;

use App\Interfaces\FactorRepositoryInterface;
use App\Models\Factor;
use App\Models\FactorItem;
use Morilog\Jalali\Jalalian;

class FactorRepository implements FactorRepositoryInterface{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $factors = Factor::leftJoin('users', 'factors.user_id', '=', 'users.user_id')->get();
        return $factors;
    }
    public function addFactor($factor_number, $exp_date, $user_id)
    {
        // TODO: Implement addFactor() method.
        $factor = new Factor();
        $factor->factor_number = $factor_number;
        $factor->register_date = Jalalian::forge('now')->getTimestamp();
        $factor->exp_date = $exp_date;
        $factor->user_id = $user_id;
        if($factor->save()){
            return $factor->factor_id;
        }
        return false;
    }
    public function addFactorItem($factor_id, $product_id, $step_id, $date, $description)
    {
        // TODO: Implement addFactorItem() method.
        $factorItem = new FactorItem();
        $factorItem->factor_id = $factor_id;
        $factorItem->product_id = $product_id;
        $factorItem->step_id = $step_id;
        $factorItem->date = $date;
        $factorItem->description = $description;
        if($factorItem->save()){
            return true;
        }
        return false;
    }
    public function getFactorById($factor_id)
    {
        // TODO: Implement getFactorById() method.
        return Factor::where('factor_id' , $factor_id)->first();
    }
    public function getFullFactorDataById($factor_id)
    {
        // TODO: Implement getFullFactorDataById() method.
        $factor = Factor::where('factor_id' , $factor_id)->first();
        return $factor;
    }
    public function getFactorItemsByFactorId($factor_id)
    {
        // TODO: Implement getFactorItemsByFactorId() method.
        return FactorItem::where('factor_id' , $factor_id)->join('products', 'factor_items.product_id', '=', 'products.product_id')->get();
    }
    public function updateFactor($factor_item_id, $step_id, $date, $description)
    {
        // TODO: Implement updateFactor() method.
        $factorItem = FactorItem::where('factor_item_id' , $factor_item_id)->first();
        $factorItem->step_id = $step_id;
        $factorItem->date = $date;
        $factorItem->description = $description;
        if($factorItem->save()){
            return true;
        }
        return false;
    }
    public function getFactorItemByFactorItemId($factor_item_id)
    {
        // TODO: Implement getFactorItemByFactorItemId() method.
        return FactorItem::where('factor_item_id' , $factor_item_id)->first();
    }
}
