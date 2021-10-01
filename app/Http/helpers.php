<?php

use App\Contest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
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
        try{
        Nexmo::message()->send([
            'to'   => $to,
            'from' => '972592722789',
            'text' => 'the OTP code for your aAcount is'.' ' .$otp
        ]);
    } catch (Throwable $e) {
        // return $e;

        return false;
    }
    }
}
        if ( ! function_exists('put_permanent_env'))
        {
            function put_permanent_env( $type, $val)
            {
                $path = base_path('.env');
                if (file_exists($path)) {
                    $val = '"'.trim($val).'"';
                    if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                        file_put_contents($path, str_replace(
                            $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                        ));
                    }
                    else{
                        file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
                    }
                    Artisan::call('cache:clear');
                }
           

            }
        }

        if ( ! function_exists('type_contect'))
        {
            function get_status( $cont)
            {
                $date = $cont->date_to_drow;
                if(  Carbon::now() > $date){
                    return   '<span class="label l-bg-orange shadow-style">منتهية </span>';
                }elseif($cont->remain_codes != 0 && Carbon::now() < $date){
                    return    '<span class="label  l-bg-purple  shadow-style">لم تنتهي بعد</span>';
                }elseif($cont->remain_codes == 0 && Carbon::now() < $date){
                    return    '<span class="label l-bg-cyan shadow-style">نفذت جميع الأكواد</span>';

                }            }
        }
    
    



