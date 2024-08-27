<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Session;
use Stripe;


class StripeController extends Controller
{
     /**
     * Show the stripe payment form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showPaymentForm(Request $request)
    {
        $amount = $request->query('amount'); // Get the amount from the query string
        return view('stripe', compact('amount')); // Pass the amount to the view
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
//     public function stripePost(Request $request)
// {
//     try {
//         \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

//         // Convert amount to paise (smallest currency unit)
//         $amount = $request->amount * 100;

//         // Validate that the amount is at least 1 paise
//         if ($amount < 1) {
//             throw new \Exception("Amount must be at least 1 INR.");
//         }

//         $charge = \Stripe\Charge::create([
//             "amount" => $amount, // Amount in paise
//             "currency" => "inr",
//             "source" => $request->stripeToken,
//             "description" => "Payment for enrollment"
//         ]);

//         \Session::flash('success', 'Payment successful!');
//         return redirect()->back();
//     } catch (\Exception $e) {
//         \Log::error('Payment failed', ['error' => $e->getMessage()]);
//         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
//     }
public function stripePost(Request $request)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Enrollment Payment." 
    ]);
  
    return redirect()->route('payment.index')->with('success', 'Payment successful!');
          
    return back();
}



}


