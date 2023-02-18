@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Site Setting Page</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('update_site_setting') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" name="id" value="{{ $setting->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Phone One</h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_one" class="form-control" required="" value="{{ $setting->phone_one }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Phone two</h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_two" class="form-control" required="" value="{{ $setting->phone_two }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Email  </h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" required="" value="{{ $setting->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Company Name </h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_name" class="form-control" required="" value="{{ $setting->company_name }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Company Email  </h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" required="" value="{{ $setting->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Company Logo</h5>
                                                    <div class="controls">
                                                        <input type="file" name="logo" class="form-control" required="" id="image">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <img src="{{ (!empty($setting->logo))? asset($setting->logo):url('upload/no_image.jpg') }}" style="width: 100px;height: 100px" id="showImage">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <h5>Company Address  </h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_address" class="form-control" required="" value="{{ $setting->company_address }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Facebook</h5>
                                                    <div class="controls">
                                                        <input type="text" name="facebook" class="form-control" required="" value="{{ $setting->facebook }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Twitter</h5>
                                                    <div class="controls">
                                                        <input type="text" name="twitter" class="form-control" required="" value="{{ $setting->twitter }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>LinkedIn</h5>
                                                    <div class="controls">
                                                        <input type="text" name="linkedin" class="form-control" required="" value="{{ $setting->linkedin }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Youtube</h5>
                                                    <div class="controls">
                                                        <input type="text" name="youtube" class="form-control" required="" value="{{ $setting->youtube }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
