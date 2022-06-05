<?php
   
namespace App\Http\Controllers;

use App\Donation;
use Exception;
use Illuminate\Http\Request;
use Session;
use Stripe;
use SweetAlert;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
    
        if(!auth()->check()){
            alert()->error('Error Message',trans('You need to login'));
            return redirect('/');
        }
        $amount = $request->amount;
        if( $amount < 1){
            alert()->error('Error Message',trans('Donation value cannot be less than 1'));
            return redirect('/');  
        }
        session(['amount' => $amount]);
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        try {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" =>  session('amount') * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Donation" 
        ]);
        $do = new Donation();
        $do->donation = session('amount');
        $do->save();
  
        Session::flash('success',trans('Payment successful!'));
          
        return back();
    } catch (Exception $e) {
        Session::flash('error',trans('Payment Error Ocerr!'));
      }
    }
}