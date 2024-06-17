<?php

namespace App\Interfaces;

interface UserRepositoryInterface{
    public function addUser($fullName , $mobile);
    public function checkUserExists($mobile);
}