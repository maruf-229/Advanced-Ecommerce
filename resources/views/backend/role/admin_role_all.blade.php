@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Total Admin User</h3>
                            <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right">Add Admin user</a>
                         </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Access</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admin_user as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($item->profile_photo_path) }}" style="width: 50px; height: 50px">
                                            </td>
                                            <td>{{ $item->name }}%</td>
                                            <td>${{ $item->email  }}</td>
                                            <td>
                                                @if($item->brand == 1)
                                                    <span class="badge badge-primary">Brand</span>
                                                @else
                                                @endif

                                                @if($item->category == 1)
                                                    <span class="badge badge-primary">Category</span>
                                                @else
                                                @endif

                                                @if($item->product == 1)
                                                    <span class="badge badge-primary">Product</span>
                                                @else
                                                @endif

                                                @if($item->slider == 1)
                                                    <span class="badge badge-primary">Slider</span>
                                                @else
                                                @endif

                                                @if($item->coupons == 1)
                                                    <span class="badge badge-primary">Coupons</span>
                                                @else
                                                @endif

                                                @if($item->shipping == 1)
                                                    <span class="badge badge-primary">Shipping</span>
                                                @else
                                                @endif

                                                @if($item->blog == 1)
                                                    <span class="badge badge-primary">Blog</span>
                                                @else
                                                @endif

                                                @if($item->setting == 1)
                                                    <span class="badge badge-primary">Setting</span>
                                                @else
                                                @endif

                                                @if($item->return_order == 1)
                                                    <span class="badge badge-primary">Return Order</span>
                                                @else
                                                @endif

                                                @if($item->review == 1)
                                                    <span class="badge badge-primary">review</span>
                                                @else
                                                @endif
                                                @if($item->orders == 1)
                                                    <span class="badge badge-primary">Orders</span>
                                                @else
                                                @endif

                                                @if($item->stock == 1)
                                                    <span class="badge badge-primary">Stock</span>
                                                @else
                                                @endif

                                                @if($item->reports == 1)
                                                    <span class="badge badge-primary">Reports</span>
                                                @else
                                                @endif

                                                @if($item->all_user == 1)
                                                    <span class="badge badge-primary">All User</span>
                                                @else
                                                @endif

                                                @if($item->admin_user_role == 1)
                                                    <span class="badge badge-primary">Admin User Role</span>
                                                @else
                                                @endif

                                            </td>

                                            <td>
                                                <a href="{{ route('pending.order.details', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i></a>
                                                <a target="_blank" href="{{ route('invoice.download', $item->id) }}" class="btn btn-danger" title="Invoice Download"><i class="fa fa-download"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>


@endsection
