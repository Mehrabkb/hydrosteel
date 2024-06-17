<?php

namespace App\Repositories;

use App\Interfaces\FactorRepositoryInterface;
use App\Models\Factor;

class FactorRepository implements FactorRepositoryInterface{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $factors = Factor::leftJoin('users', 'factors.user_id', '=', 'users.user_id')->get();
        return $factors;
    }
}
