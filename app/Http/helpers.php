<?php

use App\Contest;
use Carbon\Carbon;
use Nexmo\Laravel\Facade\Nexmo;

if (! function_exists('generateBarcodeNumber')) {
    function generateNumber() {
        $number = mt_rand(100, 999); // better than rand()
       
        // call the same function if the barcode exists already
        if (CodeNumberExists($number)) {
            return generateNumber();
        }
    
        // otherwise, it's valid and can be used
        return $number;
    }
    
    function CodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Contest::whereCode($number)->exists();
    }

    
}
if (! function_exists('sendSmsOtp')) {
    function sendSmsOtp($to,$otp) {
        // try{
        Nexmo::message()->send([
            'to'   => $to,
            'from' => '972592722789',
            'text' => 'the OTP code for your aAcount is'.' ' .$otp
        ]);
    // } catch (Throwable $e) {
    //     // return $e;

    //     return false;
    // }
    }
    
  

    
}


