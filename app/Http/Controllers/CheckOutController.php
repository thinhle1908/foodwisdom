<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = \Cart::getContent();
        $user = User::find(Auth::user()->id);

        return view('checkout', compact('cartItems'))->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cancel()
    {
    }
    public function handleSuccess(Request $request)
    {
        \Cart::clear();
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect('payment/success');
    }
    public function success(Request $request)
    {
        if ($request->session()->has('success')) {
            return view('paymentSuccess');
        } else {
            return redirect('/');
        }
    }
    public function payment(Request $request)
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|alpha_num',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'country' => 'required|string',
            'zipcode' => 'required|alpha_num',
            'paymentMethod' => 'required|between:1,2',
        ]);
        if ($request->paymentMethod == 1) {
            \Stripe\Stripe::setApiKey('sk_test_51LNA6mE1yxdaPwWfP4ShSrXnASCdZF6WP8f8ikiAMdWcRnOaiAiPyKFhV0QGs4XvE4gKtqHM9osEDs7S6mkUi9jl00IQ1OPeqD');

            $cartItems = \Cart::getContent();
            $line_item = [];
            foreach ($cartItems as $item) {
                $line_item[] = [
                    'description' => $item->id,
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $item->name,
                        ],
                        'unit_amount' => $item->price,

                    ],
                    'quantity' => $item->quantity,

                ];
            }
            $user_info = array("line1" => $request->line1, "line2" => $request->line2, "city" => $request->city, "state" => $request->province, "postal_code" => $request->zipcode, "country" => $request->contry);
            $customer = \Stripe\Customer::create(array(
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone,
                'address' => $user_info,

                // 'address_line2' =>$request->line2,
                // 'city' => $request->city,
                // 'province' => $request->province,
                // 'country' => $request->country,
                // 'zipcode' => $request->zipcode,
            ));
            $session = \Stripe\Checkout\Session::create([
                'line_items' => $line_item,

                'mode' => 'payment',
                'success_url' => asset('payment/handle-success'),
                'cancel_url' => asset('payment/handle-cancel'),
                'customer' => $customer,
                "metadata" => ['user_id' => Auth::user()->id],
            ]);

            return redirect($session->url);
        }
        else {
            $cartItems = \Cart::getContent();
            $order = Order::create([
                'user_id' =>  Auth::user()->id,
                'customer_stripe_id' => -1,
                'name' => $request->name,
                'address' => $request->line1,
                'phone' => $request->phone,
                'email' => $request->email,
                'note' => 'v',
                'total' => \Cart::getTotal(),
                'order_status' => 1,
            ]);
            foreach($cartItems as $item){
                OrderDetail::create([
                    'order_id' => $order->order_id,
                    'product_id' => $item->id,
                    'qty' => $item->quantity,
                    'price' => $item->price,
                ]);
            }
            Payment::create([
                'stripe_id' => -1,
                'order_id'=>$order->order_id,
                'amount' => -1,
                'email' => $request->email,
                'name' => $request->name,
            ]);
            return redirect()->route('checkout.handle.success');
        }
    }
}
