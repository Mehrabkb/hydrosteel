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
    public function getStep($step_id)
    {
        // TODO: Implement getStep() method.
        return Step::where('step_id' , $step_id)->first();
    }
    public function updateStep($step_id, $step_name, $step_number){
        $step = $this->getStep($step_id);
        if($step){
            $step->step_name = $step_name;
            $step->step_number = $step_number;
            if($step->save()){
                return true;
            }
        }
        return false;
    }
    public function getCountStepsAll()
    {
        // TODO: Implement getCountStepsAll() method.
        return count(Step::all());
    }
}
