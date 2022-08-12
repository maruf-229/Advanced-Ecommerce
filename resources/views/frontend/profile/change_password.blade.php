@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Change Password</span>
                            <strong></strong>
                        </h3>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.password.update') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Current Password <span></span></label>
                                    <input type="password" class="form-control"  name="oldPassword" id="current_password">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">New Password <span></span></label>
                                    <input type="password" class="form-control"  name="password" id="password">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Confirm Password <span></span></label>
                                    <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger checkout-page-button">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
