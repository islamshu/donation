<?php
   
namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;
use Session;
use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $amount = $request->amount;
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
    }
}