<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function SiteSetting(){
        $setting = SiteSetting::find(1);
        return view('backend.setting.site_update',compact('setting'));
    }

    public function SiteSettingUpdate(Request $request){

        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/'.$name_gen);
        $save_url = 'upload/'.$name_gen;
        $id = $request->id;

        SiteSetting::findOrFail($id)->update([
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'logo' => $save_url,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Site Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public  function seoSetting(){
        $seo = Seo::find(1);
        return view('backend.setting.seo_update',compact('seo'));
    }

    public  function SeoSettingUpdate(Request $request){
        $id = $request->id;
        Seo::findOrFail($id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Site Seo Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
