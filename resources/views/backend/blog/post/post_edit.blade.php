@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Blog Post</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('post_store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12">


                                        <div class="row"> {{-- start 2nd row--}}


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Title (English) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title_en" class="form-control">
                                                        @error('post_title_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Title (Bangla) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title_ban" class="form-control">
                                                        @error('post_title_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">   {{-- start 6th row--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Blog Category Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected disabled>Blog Category Select</option>
                                                            @foreach($blog_category as $bc)
                                                                <option value="{{ $bc->id }}">{{ $bc->blog_category_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Main Thumbnail<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="post_image" class="form-control" onchange="mainThumbUrl(this)">
                                                        @error('post_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="" id="mainThumb">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>



                                        <div class="row">   {{-- start 8th row--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Description (English) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <textarea id="editor1" name="post_details_en" rows="10" cols="80">

                                                            </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Description (Bangla) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <textarea id="editor2" name="post_details_ban" rows="10" cols="80">

                                                            </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>

                                <hr>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Post">
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


    <script type="text/javascript">
        function mainThumbUrl(input){
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#mainThumb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@endsection
