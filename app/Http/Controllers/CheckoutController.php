<?php
namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Charge;
use Session;
use Mail;
use Stripe\Stripe;
use Illuminate\Http\Request;
class CheckoutController extends Controller
{
    public function index()
    {
        if(Cart::content()->count() == 0)
        {
            Session::flash('info', 'Your cart is empty. Do some shopping :)');
            return redirect()->back();
        }
        return view('checkout');
    }
    public function pay()
    {
        Stripe::setApiKey("sk_test_aoDrL9cNdRRN3BZ1z6q2TJqi");
        $charge = Charge::create([
            'amount' => 100,
            'currency' => 'usd',
            'description' => 'udemy course practice selling books',
            'source' => request()->stripeToken
        ]);

        Session::flash('success', 'Successfully transfer. Wait for our mail.');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\SendingMail());

        return redirect('/');
    }
}




