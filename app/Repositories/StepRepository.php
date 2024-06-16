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
    public function addStep($step_name, $step_number)
    {
        // TODO: Implement addStep() method.
        $step = new Step();
        $step->step_name = $step_name;
        $step->step_number = $step_number;
        if($step->save()){
            return true;
        }
        return false;
    }
    public function removeStep($step_id)
    {
        // TODO: Implement removeStep() method.
        $step = Step::where('step_id' , $step_id)->first();
        if($step){
            $step->delete();
            return true;
        }
        return false;
    }
}
