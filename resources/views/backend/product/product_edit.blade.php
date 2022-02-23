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
                    <h4 class="box-title">Edit Product</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('product_store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">    {{-- start 1st row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control">
                                                            <option value="" selected disabled>Select Brand</option>
                                                            @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected':'' }}>{{ $brand->brand_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected disabled>Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected':'' }}>{{ $category->category_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control">
                                                            <option value="" selected disabled>Select SubCategory</option>
                                                            @foreach($subcategory as $sub)
                                                                <option value="{{ $sub->id }}" {{ $sub->id == $products->subcategory_id ? 'selected':'' }}>{{ $sub->subcategory_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"> {{-- start 2nd row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Sub-SubCategory <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="sub_subcategory_id" class="form-control">
                                                            <option value="" selected disabled>Select Sub-SubCategory</option>
                                                            @foreach($sub_subcategory as $subsub)
                                                                <option value="{{ $subsub->id }}" {{ $subsub->id == $products->sub_subcategory_id ? 'selected':'' }}>{{ $subsub->sub_sub_category_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('sub_subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name (English) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control">
                                                        @error('product_name_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name (Bangla) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_ban" class="form-control">
                                                        @error('product_name_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">   {{-- start 3rd row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control">
                                                        @error('product_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control">
                                                        @error('product_qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags (English) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput">
                                                        @error('product_tags_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">   {{-- start 4th row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags (Bangla) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_ban" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput">
                                                        @error('product_tags_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size (English) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control" value="Small,Medium,Large" data-role="tagsinput">
                                                        @error('product_size_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size (Bangla) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_ban" class="form-control" value="ছোট,মধ্যম,বড়" data-role="tagsinput">
                                                        @error('product_size_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">   {{-- start 5th row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color (English) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput">
                                                        @error('product_color_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color (Bangla) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_ban" class="form-control" value="Small,Medium,Large" data-role="tagsinput">
                                                        @error('product_color_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control">
                                                        @error('selling_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">   {{-- start 6th row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control">
                                                        @error('discount_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Main Thumbnail<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thumbnail" class="form-control" onchange="mainThumbUrl(this)">
                                                        @error('product_thumbnail')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="" id="mainThumb">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Multiple Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" class="form-control" multiple id="multiImg">
                                                        @error('multi_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="row" id="preview_img"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">   {{-- start 7th row--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Short Description (English) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Short Description (Bangla) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_ban" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                        @error('short_descp_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">   {{-- start 8th row--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Long Description (English) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
                                                                Product English Long Description Goes Here
                                                            </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Long Description (Bangla) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <textarea id="editor2" name="long_descp_ban" rows="10" cols="80">
                                                                 Product Bangla Long Description Goes Here
                                                            </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
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
        $(document).ready(function (){
            $('select[name="category_id"]').on('change',function (){
                var category_id = $(this).val();
                if (category_id){
                    $.ajax({
                        url : "{{ url('category/subcategory/ajax') }}/"+category_id,
                        type : "GET",
                        dataType : "json",
                        success:function (data){
                            $('select[name="sub_subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data,function (key,value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


            $('select[name="subcategory_id"]').on('change',function (){
                var subcategory_id = $(this).val();
                if (subcategory_id){
                    $.ajax({
                        url : "{{ url('category/sub-subcategory/ajax') }}/"+subcategory_id,
                        type : "GET",
                        dataType : "json",
                        success:function (data){
                            var d = $('select[name="sub_subcategory_id"]').empty();
                            $.each(data,function (key,value){
                                $('select[name="sub_subcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_sub_category_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });
    </script>

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

    <script type="text/javascript">

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>

@endsection
