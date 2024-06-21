<?php

namespace App\Http\Controllers;

use App\Repositories\FactorRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(FactorRepository $factorRepository , UserRepository $userRepository){
        $this->factorRepository = $factorRepository;
        $this->userRepository = $userRepository;
    }
    public function factorViewer(Request $request){
        if($request->isMethod('GET')){
            return view('customer.customer');
        }
        if($request->isMethod('POST')){
            $validate = $request->validate([
                'mobile' => 'required',
                'factor-number' => 'required',
                'g-recaptcha-response' => 'required|captcha'
            ],[
                'mobile.required' => 'شماره موبایل را وارد کنید',
                'factor-number.required' => 'شماره فاکتور را وارد کنید',
                'g-recaptcha-response.required' => 'اعتبارسنجی الزامی می باشد'
            ]);
            if($validate){
                $mobile = htmlspecialchars($request->input('mobile'));
                $factorNumber = htmlspecialchars($request->input('factor-number'));
                $factor = $this->factorRepository->getFactorByFactorNumber($factorNumber);
                if($factor){
                    $user = $this->userRepository->getUserByUserId($factor->user_id);
                    if($user->mobile == $mobile){
                        $factorItems = $this->factorRepository->getFactorItemsByFactorId($factor->factor_id);
                        return redirect()->back()->with(['factor' => $factor, 'factorItems' => $factorItems , 'user' => $user]);

                    }else{
                        return redirect()->back()->withErrors('شماره موبایل متعلق به این فاکتور نمی باشد');
                    }
                }else{
                    return redirect()->back()->withErrors('فاکتوری با این مشخصات یافت نشد');
                }
            }
        }
    }
}
