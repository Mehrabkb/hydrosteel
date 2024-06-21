<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }
    public function userLogin(Request $request){
        if($request->isMethod('GET')){
            return view('userLogin');
        }
        if($request->isMethod('POST')){
            if(Auth::check()){
                return redirect('admin.home');
            }
            $validate = $request->validate([
                'user-name' => 'required',
                'password' => 'required',
                'g-recaptcha-response' => 'required|captcha'
            ] , [
                'user-name.required' => 'نام کاربری الزامی است',
                'password.required' => 'رمز عبور الزامی است',
                'g-recaptcha-response.required' => 'اعتبارسنجی الزامی می باشد'
            ]);
            if($validate){
                $userName = $request->input('user-name');
                $password = $request->input('password');
                $user_id = $this->userRepository->checkUserPassword($userName , $password);
                if($user_id){
                    Auth::loginUsingId($user_id);
                    return redirect()->route('admin.home');
                }
                return redirect()->back()->withErrors('نام کاربری یا رمز عبور اشتباه است');
            }
        }
    }
}
