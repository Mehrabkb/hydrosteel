<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface{
    public function addUser($fullName, $mobile)
    {
        // TODO: Implement AddUser() method.
        if($this->checkUserExists($mobile)){
            return $this->checkUserExists($mobile);
        }else{
            $user = new User();
            $user->full_name = $fullName;
            $user->email = 'test@test.com';
            $user->password = 'test';
            $user->mobile = $mobile;
            if($user->save()){
                return $user->user_id;
            }
            return false;
        }
    }
    public function checkUserExists($mobile)
    {
        // TODO: Implement checkUserExists() method.
        if(User::where('mobile', $mobile)->exists()){
            return User::where('mobile', $mobile)->first()->user_id;
        }
        return false;
    }
    public function getUserByUserId($user_id)
    {
        // TODO: Implement getUserByUserId() method.
        return User::where('user_id', $user_id)->first();
    }
    public function getUserByUserName($username)
    {
        // TODO: Implement getUserByUserName() method.
        return User::where('full_name', $username)->first();
    }
    public function checkUserPassword($username, $password)
    {
        // TODO: Implement checkUserPassword() method.
        $user = $this->getUserByUserName($username);
        if($user){
            if(Hash::check($password, $user->password)){
                return $user->user_id;
            }
        }
        return false;
    }
}
