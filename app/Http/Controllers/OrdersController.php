<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userindex()
    {
        $orders = Order::orderBy('order_id','desc')->where('user_id', Auth::user()->id)->get();
        $getorderXorderDetails = [];
        $order_details = [];
        foreach ($orders as $order) {
            $order_details = OrderDetail::where('order_id', $order->order_id)->get();
            foreach($order_details as $order_detail){
                $product =  Product::where('id',$order_detail['product_id'])->get();
               $order_detail['image'] = $product[0]['image'];
               $order_detail['name'] = $product[0]['product_name'];
            }
            $getorderXorderDetails[] = ['order_id' => $order->order_id, 'order_details' => $order_details];
        }
        return view('userOrder')->with('orders', $getorderXorderDetails);
    }
    public function adminindex()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);

        return view('adminOrder')->with('orders', $orders);
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
        $order = Order::find($id);
        return view('adminEditOrder')->with('order', $order);
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
        request()->validate([
            'order_status' => 'required|numeric|between:1,4',
        ]);
        $order = Order::find($id);
        $order->update([
            'order_status' => $request->order_status
        ]);
        return redirect('/dashboard/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
        $order = Order::find($order_id);
        $order->delete();
        return redirect('/dashboard/orders');
    }
}
