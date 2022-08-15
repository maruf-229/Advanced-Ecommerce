<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function myOrders(){
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.profile.order.order_view',compact('orders'));
    }

    public function orderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('frontend.profile.order.order_details',compact('order','orderItem'));
    }

    public function invoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

//        return view('frontend.profile.order.order_invoice',compact('order','orderItem'));
        $pdf = Pdf::loadView('frontend.profile.order.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function returnOrder(Request $request,$order_id){
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);

        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('my.orders')->with($notification);
    }

    public function returnOrderList(){
        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.profile.order.return_order_view',compact('orders'));
    }

    public function cancelOrders(){
        $orders = Order::where('user_id',Auth::id())->where('status','cancelled')->orderBy('id','DESC')->get();
        return view('frontend.profile.order.cancelled_order_view',compact('orders'));
    }
}
