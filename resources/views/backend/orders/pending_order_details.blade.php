@extends('admin.admin_master')
@section('admin')

    <div class="container-full">

        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Order Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Order Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong></h4>
                        </div>
                        <table class="table">

                            <tr>
                                <th>Shipping Name :</th>
                                <th>{{ $order->name }}</th>
                            </tr>

                            <tr>
                                <th>Shipping Phone :</th>
                                <th>{{ $order->phone }}</th>
                            </tr>

                            <tr>
                                <th>Shipping Email :</th>
                                <th>{{ $order->email }}</th>
                            </tr>

                            <tr>
                                <th>Division :</th>
                                <th>{{ $order->division->division_name }}</th>
                            </tr>

                            <tr>
                                <th>District :</th>
                                <th>{{ $order->district->district_name }}</th>
                            </tr>

                            <tr>
                                <th>State :</th>
                                <th>{{ $order->state->state_name }}</th>
                            </tr>

                            <tr>
                                <th>Post Code :</th>
                                <th>{{ $order->post_code }}</th>
                            </tr>

                            <tr>
                                <th>Order Date :</th>
                                <th>{{ $order->order_date }}</th>
                            </tr>

                        </table>
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order Details</strong></h4>
                            <span class="text-danger">Invoice : {{ $order->invoice_no }}</span>
                        </div>
                        <table class="table">

                            <tr>
                                <th>Name :</th>
                                <th>{{ $order->user->name }}</th>
                            </tr>

                            <tr>
                                <th>Phone :</th>
                                <th>{{ $order->user->phone }}</th>
                            </tr>

                            <tr>
                                <th>Payment Type :</th>
                                <th>{{ $order->payment_method }}</th>
                            </tr>

                            <tr>
                                <th>Transaction ID :</th>
                                <th>{{ $order->transaction_id }}</th>
                            </tr>

                            <tr>
                                <th>Invoice :</th>
                                <th class="text-danger">{{ $order->invoice_no }}</th>
                            </tr>

                            <tr>
                                <th>Order Total :</th>
                                <th>${{ $order->amount }}</th>
                            </tr>

                            <tr>
                                <th>Order :</th>
                                <th><span class="badge badge-pill badge-warning" style="background: #418DB9">{{ $order->status }}</span></th>
                            </tr>

                            <tr>
                                <th></th>
                                <th>
                                    @if($order->status == 'Pending')
                                        <a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-black btn-success" id="confirm">Confirm Order</a>
                                    @elseif($order->status == 'confirmed')
                                        <a href="{{ route('confirm-processing',$order->id) }}" class="btn btn-black btn-success" id="processing">Processing Order</a>
                                    @elseif($order->status == 'processing')
                                        <a href="{{ route('processing-picked',$order->id) }}" class="btn btn-black btn-success" id="picked">Picked Order</a>
                                    @elseif($order->status == 'picked')
                                        <a href="{{ route('picked-shipped',$order->id) }}" class="btn btn-black btn-success" id="shipped">Shipped Order</a>
                                    @elseif($order->status == 'shipped')
                                        <a href="{{ route('shipped-delivered',$order->id) }}" class="btn btn-black btn-success" id="delivered">Delivered Order</a>
                                    @elseif($order->status == 'delivered')
                                        <a href="{{ route('delivered-cancelled',$order->id) }}" class="btn btn-black btn-success" id="cancelled">Cancel Order</a>
                                    @endif
                                </th>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>
            <!-- /.row -->


            <div class="row">

                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Ordered Products</strong> </h4>
                        </div>
                        <table class="table">
                            <tbody>

                            <tr style="">
                                <td class="col-md-1">
                                    <label for=""><b>Image</b></label>
                                </td>

                                <td width="20%">
                                    <label for=""><b>Product Name</b></label>
                                </td>

                                <td width="10%">
                                    <label for=""><b>Product Code</b></label>
                                </td>

                                <td width="10%">
                                    <label for=""><b>Color</b></label>
                                </td>

                                <td width="10%">
                                    <label for=""><b>Size</b></label>
                                </td>

                                <td width="10%">
                                    <label for=""><b>Quantity</b></label>
                                </td>

                                <td width="10%">
                                    <label for=""><b>Price</b></label>
                                </td>

                            </tr>

                            @foreach($orderItem as $item)
                                <tr>
                                    <td class="col-md-1">
                                        <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" width="50px;" height="50px;"></label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">{{ $item->product->product_name_en }}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">{{ $item->product->product_code }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">{{ $item->color }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">{{ $item->size }}</label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for="">{{ $item->qty }}</label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for="">${{ $item->price }} (${{ $item->price * $item->qty }}) </label>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col -->


            </div>
        </section>
        <!-- /.content -->

    </div>


@endsection
