<?php

namespace App\Http\Controllers;

use App\Repositories\StepRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(StepRepository $stepRepository){
        $this->stepRepository = $stepRepository;
    }
    public function home(Request $request){
        return view('admin.home');
    }
    public function factor(Request $request){
        switch ($request->method()){
            case 'GET':
                return view('admin.factor');
            break;
        }
    }
    public function product(Request $request){
        switch ($request->method()){
            case 'GET':
                return view('admin.product');
            break;
        }
    }
    public function step(Request $request){
        switch ($request->method()){
            case 'GET':
                $steps = $this->stepRepository->getAll();
                return view('admin.step' , compact('steps'));
            break;
        }
    }
    public function addStep(Request $request){
        switch ($request->method()){
            case 'POST':
                $validate = $request->validate(
                    [
                        'step-name' => 'required',
                        'step-number' => 'required'
                    ]
                    ,[
                        'step-name.required' => 'نام مرحله را وارد کنید',
                        'step-number.required' => 'شماره مرحله را وارد کنید'
                ]);
                if($validate){
                    $step_name = htmlspecialchars($request->input('step-name'));
                    $step_number = htmlspecialchars($request->input('step-number'));
                    if($this->stepRepository->addStep($step_name , $step_number)){
                        return redirect()->back()->with(['success' , 'با موفقیت انجام شد']);
                    }
                    return redirect()->back()->withErrors('مشکلی رخ داده است');
                }
        }
    }
    public function removeStep(Request $request){
        if($request->isMethod('POST')){
            $validate = $request->validate([
                'step_id' => 'required'
            ],[
                'step_id.required' => 'آیدی مرحله اجباری است'
            ]);
            if($validate){
                $step_id = htmlspecialchars($request->input('step_id'));
                if($this->stepRepository->removeStep($step_id)){
                    return true;
                }
                return false;
            }
        }
    }
}
