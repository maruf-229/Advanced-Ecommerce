@extends('admin.admin_master')
@section('admin')


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
                            <form action="{{ route('update_seo_setting') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" name="id" value="{{ $seo->id }}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Meta Title</h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_title" class="form-control" required="" value="{{ $seo->meta_title }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Meta Author</h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_author" class="form-control" required="" value="{{ $seo->meta_author }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Meta Keyword</h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_keyword" class="form-control" required="" value="{{ $seo->meta_keyword }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Meta Description</h5>
                                                    <div class="controls">
                                                        <textarea class="form-control" name="meta_description" >
                                                            {{ $seo->meta_description }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Google Analytics</h5>
                                                    <div class="controls">
                                                        <textarea class="form-control" name="google_analytics" >
                                                            {{ $seo->google_analytics }}
                                                        </textarea>
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


@endsection
