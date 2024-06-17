<?php

namespace App\Http\Controllers;

use App\Repositories\FactorRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StepRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(StepRepository $stepRepository
        , FactorRepository $factorRepository , UserRepository $userRepository
        , ProductRepository $productRepository){
        $this->stepRepository = $stepRepository;
        $this->factorRepository = $factorRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }
    public function home(Request $request){
        return view('admin.home');
    }
    public function factor(Request $request){
        switch ($request->method()){
            case 'GET':
                $steps = $this->stepRepository->getAll();
                $factors = $this->factorRepository->getAll();
                return view('admin.factor' , compact('steps' , 'factors'));
            break;
        }
    }
    public function addFactor(Request $request){
        if($request->isMethod('POST')){
            $validated = $request->validate([
                'user-name' => 'required|regex:/^[آ-یء-ً\s]+$/u',
                'user-mobile' => 'required|regex:/^09[0-9]{9}$/',
                'factor-number' => 'required|numeric',
                'product-step-id' => 'required',
                'product-title' => 'required',
                'exp-date' => 'required',
                'product-date' => 'required',
                'product-description' => 'required'
            ],[
                'user-name.required' => 'نام کاربر الزامی میباشد ',
                'user-name.regex' => 'نام کاربر فقط باید فارسی باشد',
                'user-mobile.required' => 'شماره موبایل الزامی میباشد ',
                'user-mobile.regex' => 'لطفا شماره موبایل را با فرمت صحیح وارد کنید',
                'factor-number.required' => 'شماره فاکتور الزامی میباشد',
                'factor-number.numeric' => 'شماره فاکتور نامعتبر است',
                'product-step-id.required' => 'مرحله الزامی است',
                'product-title.required' => 'نام محصول الزامی میباشد',
                'exp-date.required' => 'تاریخ تقریبی فاکتور الزامی است',
                'product-date.required' => 'تاریخ تقریبی محصول الزامی است',
                'product-description.required' => 'توضیحات محصول الزامی است'
            ]);
            if($validated){
                $username = htmlspecialchars($request->input('user-name'));
                $usermobile = htmlspecialchars($request->input('user-mobile'));
                $factornumber = htmlspecialchars($request->input('factor-number'));
                $productstepids = $request->input('product-step-id');
                $producttitles = $request->input('product-title');
                $expdate = htmlspecialchars($request->input('exp-date'));
                $productdates = $request->input('product-date');
                $productdescriptions = $request->input('product-description');
                $user_id = $this->userRepository->addUser($username , $usermobile);
                for($i = 0 ; $i < count($productstepids) ; $i++){
                    $productstepids[$i] = htmlspecialchars($productstepids[$i]);
                    $producttitles[$i] = htmlspecialchars($producttitles[$i]);
                    $productdates[$i] = htmlspecialchars($productdates[$i]);
                    $productdescriptions[$i] = htmlspecialchars($productdescriptions[$i]);
                }
                if($user_id){
                    $factor_id = $this->factorRepository->addFactor($factornumber , $expdate , $user_id);
                    if($factor_id){
                        for($i = 0 ; $i < count($productstepids) ; $i++){
                            $product_id = $this->productRepository->addProduct($producttitles[$i]);
                            if($product_id){
                                $this->factorRepository->addFactorItem($factor_id , $product_id , $productstepids[$i] ,
                                $productdates[$i] , $productdescriptions[$i]);
                                return redirect()->back()->with(['success' , 'با موفقیت ثبت شد']);
                            }else{
                                return redirect()->back()->withErrors('خطایی رخ داده است');
                            }
                        }
                    }else{
                        return redirect()->back()->withErrors('در ثبت فاکتور خطایی رخ داده است');
                    }
                }else{
                    return redirect()->back()->withErrors('در ثبت کاربر خطایی رخ داده است');
                }

            }
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
    public function singleStep(Request $request){
        if($request->isMethod('POST')){
            $validate = $request->validate([
                'step_id' => 'required'
            ],[
                'step_id.required' => 'مقدار الزامی است'
            ]);
            if($validate){
                $step_id = htmlspecialchars($request->input('step_id'));
                $step = $this->stepRepository->getStep($step_id);
                if($step){
                    return $step;
                }
                return false;
            }
        }
    }
    public function editStep(Request $request){
        if($request->isMethod('POST')){
            $validate = $request->validate([
                'step-id' => 'required',
                'step-name' => 'required',
                'step-number' => 'required'
            ],[
                'step-id.required' => 'آیدی مرحله الزامی است',
                'step-name.required' => 'نام مرحله الزامی است',
                'step-number.required' => 'شماره مرحله الزامی است'
            ]);
            if($validate){
                $step_id = htmlspecialchars($request->input('step-id'));
                $step_name = htmlspecialchars($request->input('step-name'));
                $step_number = htmlspecialchars($request->input('step-number'));
                if($this->stepRepository->updateStep($step_id , $step_name , $step_number)){
                    return redirect()->back()->with(['success' , 'با موفقیت ویرایش شد']);
                }
                return redirect()->back()->withErrors('مشکلی رخ داده است');
            }
        }
    }
}
