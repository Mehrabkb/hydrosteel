<?php
namespace App\Interfaces;

use App\Models\Step;

interface StepRepositoryInterface{
    public function getAll();
    public function addStep($step_name , $step_number);
    public function removeStep($step_id);
    public function getStep($step_id);
    public function updateStep($step_id , $step_name , $step_number);
    public function getCountStepsAll();
}
