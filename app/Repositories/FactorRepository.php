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
        $factor->register_date = Jalalian::forge('now');
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
}
