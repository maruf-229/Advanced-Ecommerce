@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                {{--                edit sub_subCategory Form--}}

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Sub-SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form action="{{ route('sub_subcategory.update') }}" method="POST" >
                                    @csrf

                                    <input type="hidden" name="id" class="form-control" value="{{ $sub_subcategory->id }}">

                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="" selected disabled>Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $sub_subcategory->category_id ? 'selected':'' }}>{{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control">
                                                <option value="" selected disabled>Select SubCategory</option>
                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $sub_subcategory->subcategory_id ? 'selected':'' }}>{{ $subcategory->subcategory_name_en }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory Name (english) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="sub_sub_category_name_en" class="form-control" value="{{ $sub_subcategory->sub_sub_category_name_en }}">
                                            @error('sub_sub_category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory Name (bangla) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="sub_sub_category_name_ban" class="form-control"value="{{ $sub_subcategory->sub_sub_category_name_ban }}">
                                            @error('sub_sub_category_name_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
