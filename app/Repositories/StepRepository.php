<?php
namespace App\Repositories;

use App\Interfaces\StepRepositoryInterface;
use App\Models\Step;

class StepRepository implements StepRepositoryInterface{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        return Step::all();
    }
}
