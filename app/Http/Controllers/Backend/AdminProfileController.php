<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData=Admin::find(1);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function AdminProfileEdit(){
        $editData=Admin::find(1);
        return view('admin.admin_profile_edit',compact('editData'));
    }
}
