@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Create Admin User</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('admin.user.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $admin_user->id }}">
                                <input type="hidden" name="old_image" value="{{ $admin_user->profile_photo_path }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{ $admin_user->name }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Email  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" value="{{ $admin_user->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Phone <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone" class="form-control" value="{{ $admin_user->phone }}">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_photo_path" class="form-control"  id="image">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <img src="{{ url('upload/no_image.jpg') }}" style="width: 100px;height: 100px" id="showImage">
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="brand" value="1" {{ $admin_user->brand == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_2">Brand</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="category" value="1" {{ $admin_user->category == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_3">Category</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="product" value="1" {{ $admin_user->product == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Product</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="slider" value="1" {{ $admin_user->slider == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_5">Slider</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_6" name="coupons" value="1" {{ $admin_user->coupons == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_6">Coupons</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_7" name="shipping" value="1" {{ $admin_user->shipping == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_7">Shipping</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_8" name="blog" value="1" {{ $admin_user->blog == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_8">Blog</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_9" name="setting" value="1" {{ $admin_user->setting == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_9">Setting</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_10" name="return_order" value="1" {{ $admin_user->return_order == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_10">Return Order</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_11" name="review" value="1" {{ $admin_user->review == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_11">Review</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_12" name="orders" value="1" {{ $admin_user->orders == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_12">Orders</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_13" name="stock" value="1" {{ $admin_user->stock == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_13">Stock</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_14" name="reports" value="1" {{ $admin_user->reports == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_14">Reports</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_15" name="all_user" value="1" {{ $admin_user->all_user == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_15">All User</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_16" name="admin_user_role" value="1" {{ $admin_user->admin_user_role == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_16">Admin User Role</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Admin User">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

    <script>
        $(document).ready(function (){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
