<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function pendingOrders(){
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }

    public function pendingOrderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('backend.orders.pending_order_details',compact('order','orderItem'));
    }

    public function confirmedOrders(){
        $orders = Order::where('status','confirmed')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_orders',compact('orders'));
    }

    public function processingOrders(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }

    public function pickedOrders(){
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    }

    public function shippedOrders(){
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    }

    public function deliveredOrders(){
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    }

    public function cancelledOrders(){
        $orders = Order::where('status','cancelled')->orderBy('id','DESC')->get();
        return view('backend.orders.cancelled_orders',compact('orders'));
    }

    public function pendingToConfirm($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'confirmed'
        ]);

        $notification = array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    public function confirmToProcessing($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'processing'
        ]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('confirmed-orders')->with($notification);
    }

    public function processingToPicked($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'picked'
        ]);

        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('processing-orders')->with($notification);
    }

    public function pickedToShipped($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'shipped'
        ]);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('picked-orders')->with($notification);
    }

    public function shippedToDelivered($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'delivered'
        ]);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('shipped-orders')->with($notification);
    }

    public function deliveredToCancelled($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'cancelled'
        ]);

        $notification = array(
            'message' => 'Order Cancelled Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('delivered-orders')->with($notification);
    }
}
