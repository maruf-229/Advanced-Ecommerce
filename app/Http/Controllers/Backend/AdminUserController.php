<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function allAdminRole(){
        $admin_user = Admin::where('type',2)->latest()->get();
        return view('backend.role.admin_role_all',compact('admin_user'));
    }
}
