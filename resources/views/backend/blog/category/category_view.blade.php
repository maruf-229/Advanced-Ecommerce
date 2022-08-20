@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Blog Category List <span class="badge badge-pill badge-danger">{{ count($blog_category) }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Blog Category En</th>
                                        <th>Blog Category Ban</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blog_category as $item)
                                        <tr>
                                            <td>{{ $item->blog_category_name_en }}</td>
                                            <td>{{ $item->blog_category_name_ban }}</td>
                                            <td>
                                                <a href="{{ route('blog_category.edit', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('blog_category.delete', $item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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

                {{--                Add Category Form--}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Blog Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form action="{{ route('blog_category.store') }}" method="POST" >
                                    @csrf

                                    <div class="form-group">
                                        <h5>Blog Category Name (English) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_en" class="form-control">
                                            @error('blog_category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Blog Category Name (Bangla) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_ban" class="form-control">
                                            @error('blog_category_name_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Insert">
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
