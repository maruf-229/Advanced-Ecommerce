@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">


                {{--                Add Category Form--}}

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Blog Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form action="{{ route('blog_category.update') }}" method="POST" >
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $blog_category->id }}">

                                    <div class="form-group">
                                        <h5>Blog Category Name (English) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_en" class="form-control" value="{{ $blog_category->blog_category_name_en }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Blog Category Name (Bangla) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_ban" class="form-control" value="{{ $blog_category->blog_category_name_ban }}">
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>


@endsection
