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
}
