<?php
namespace App\Interfaces;

use App\Models\Step;

interface StepRepositoryInterface{
    public function getAll();
    public function addStep($step_name , $step_number);
    public function removeStep($step_id);
}
