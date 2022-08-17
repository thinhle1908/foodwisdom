<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function webhook(Request $request)
    {
        if ($request->type === 'charge.succeeded') {
            try {
                \Stripe\Stripe::setApiKey('sk_test_51LNA6mE1yxdaPwWfP4ShSrXnASCdZF6WP8f8ikiAMdWcRnOaiAiPyKFhV0QGs4XvE4gKtqHM9osEDs7S6mkUi9jl00IQ1OPeqD');
                $customer = \Stripe\Customer::retrieve(
                    $request->data['object']['customer'],
                    []
                );
                Payment::create([
                    'stripe_id' => $request->data['object']['id'],
                    'amount' => $request->data['object']['amount'],
                    'email' => $request->data['object']['billing_details']['email'],
                    'name' => $request->data['object']['billing_details']['name'],
                ]);
                $order = Order::create([
                    'user_id' => $customer['metadata']['user_id'],
                    'name' => $customer['name'],
                    'address' => $customer['address']['line1'],
                    'phone' => $customer['phone'],
                    'email' => $customer['email'],
                    'note' => 'v',
                    'total' => $request->data['object']['amount'],
                    'order_status' => 1,
                ]);
                $cartItems = \Cart::getContent();
                // foreach ($cartItems as $item) {
                OrderDetail::create([
                    'order_id' => 3,
                    'product_id' => 3,
                    'qty' => 1,
                    'price' => 100,
                ]);
                //}
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }
}
