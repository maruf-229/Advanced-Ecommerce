@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4>Shipping Details</h4></div><hr>
                        <div class="card-body" style="background: #E9EBEC;">
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
                </div>


                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4>Order Details
                            <span class="text-danger">Invoice : {{ $order->invoice_no }}</span></h4>
                        </div><hr>
                        <div class="card-body" style="background: #E9EBEC;">
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

                            </table>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                <tr style="background: #E2E2E2">
                                    <td class="col-md-1">
                                        <label for="">Image</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">Product Name</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">Product Code</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">Color</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">Size</label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for="">Quantity</label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for="">Price</label>
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
                </div>

                @if($order->statu !== "delivered")

                @else
               <div class="form-group">
                   <label for="label">Order Return Reason</label>
                   <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>
               </div>
                @endif

            </div>
        </div>
    </div>
@endsection
