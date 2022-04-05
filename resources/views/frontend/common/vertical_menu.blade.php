<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @php
                $categories = \App\Models\Category::orderBy('category_name_en','ASC')->get();
            @endphp

            @foreach($categories as $category)
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
                        @if(session()->get('language') == 'bangla'){{ $category->category_name_ban }} @else {{ $category->category_name_en }} @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">

                                @php
                                    $subcategories = \App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                @endphp

                                @foreach($subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">
                                        <h2 class="title">
                                            @if(session()->get('language') == 'bangla'){{ $subcategory->subcategory_name_ban }} @else {{ $subcategory->subcategory_name_en }} @endif
                                        </h2>

                                        @php
                                            $sub_subcategories = \App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('sub_sub_category_name_en','ASC')->get();
                                        @endphp

                                        @foreach($sub_subcategories as $sub_subcategory)
                                            <ul class="links list-unstyled">
                                                <li><a href="#">
                                                        @if(session()->get('language') == 'bangla'){{ $sub_subcategory->sub_sub_category_name_ban }} @else {{ $sub_subcategory->sub_sub_category_name_en }} @endif
                                                    </a></li>
                                            </ul>
                                        @endforeach
                                    </div>
                            @endforeach
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
        @endforeach
        <!-- /.menu-item -->

            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                <!-- /.dropdown-menu -->
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
                <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
