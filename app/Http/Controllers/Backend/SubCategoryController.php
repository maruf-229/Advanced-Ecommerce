<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function sub_categoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory','categories'));
    }

    public function sub_categoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ban' => 'required',
        ],[
            'category_id.required' => 'Please Select Any Option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
            'subcategory_name_ban.required' => 'Input SubCategory Bangla Name',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ban' => $request->subcategory_name_ban,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_ban' => str_replace(' ','-',$request->subcategory_name_ban),
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function sub_categoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','categories'));
    }

    public function sub_categoryUpdate(Request $request){
        $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ban' => $request->subcategory_name_ban,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_ban' => str_replace(' ','-',$request->subcategory_name_ban),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.sub_category')->with($notification);
    }

    public function sub_categoryDelete($id){
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }


    //That for sub->sub category controllers

    public function sub_sub_categoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sub_subcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view',compact('sub_subcategory','categories'));
    }

    public function GetSubcategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function sub_sub_categoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'sub_sub_category_name_en' => 'required',
            'sub_sub_category_name_ban' => 'required',
        ],[
            'category_id.required' => 'Please Select Any Option',
            'sub_sub_category_name_en.required' => 'Input Sub-SubCategory English Name',
            'sub_sub_category_name_ban.required' => 'Input Sub-SubCategory Bangla Name',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_sub_category_name_en' => $request->sub_sub_category_name_en,
            'sub_sub_category_name_ban' => $request->sub_sub_category_name_ban,
            'sub_sub_category_slug_en' => strtolower(str_replace(' ','-',$request->sub_sub_category_name_en)),
            'sub_sub_category_slug_ban' => str_replace(' ','-',$request->sub_sub_category_name_ban),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function sub_sub_categoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $sub_subcategory = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit',compact('subcategories','categories','sub_subcategory'));
    }

    public function sub_sub_categoryUpdate(Request $request){
        $sub_subcat_id = $request->id;

        SubSubCategory::findOrFail($sub_subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_sub_category_name_en' => $request->sub_sub_category_name_en,
            'sub_sub_category_name_ban' => $request->sub_sub_category_name_ban,
            'sub_sub_category_slug_en' => strtolower(str_replace(' ','-',$request->sub_sub_category_name_en)),
            'sub_sub_category_slug_ban' => str_replace(' ','-',$request->sub_sub_category_name_ban),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.sub_sub_category')->with($notification);
    }

    public function sub_sub_categoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

}
