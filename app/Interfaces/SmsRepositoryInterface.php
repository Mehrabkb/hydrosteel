<?php

namespace App\Interfaces;

interface SmsRepositoryInterface {
    public function sendSms($number, $message);
}
