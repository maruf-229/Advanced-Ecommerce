@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub Category List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>SubCategory En</th>
                                        <th>SubCategory Ban</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subcategory as $item)
                                        <tr>
                                            <td>{{ $item['category']['category_name_en'] }}</td>
                                            <td>{{ $item->subcategory_name_en }}</td>
                                            <td>{{ $item->subcategory_name_ban }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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

                {{--                Add subCategory Form--}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form action="{{ route('subcategory.store') }}" method="POST" >
                                    @csrf

                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="" selected disabled>Select Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory Name (english) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" class="form-control">
                                            @error('subcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory Name (bangla) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_ban" class="form-control">
                                            @error('subcategory_name_ban')
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
