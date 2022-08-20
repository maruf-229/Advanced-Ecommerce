<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogCategory(){
        $blog_category = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view',compact('blog_category'));
    }

    public function blogCategoryStore(Request $request){
        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_ban' => 'required',
        ],[
            'blog_category_name_en.required' => 'Input Blog Category English Name',
            'blog_category_name_ban.required' => 'Input Blog Category Bangla Name',
        ]);

        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ban' => $request->blog_category_name_ban,
            'blog_category_slug_en' => strtolower(str_replace(' ','-',$request->blog_category_name_en)),
            'blog_category_slug_ban' => str_replace(' ','-',$request->blog_category_name_ban),
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function blogCategoryEdit($id){
        $blog_category = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit',compact('blog_category'));
    }

    public function blogCategoryUpdate(Request $request){
        $cat_id = $request->id;

        BlogPostCategory::findOrFail($cat_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ban' => $request->blog_category_name_ban,
            'blog_category_slug_en' => strtolower(str_replace(' ','-',$request->blog_category_name_en)),
            'blog_category_slug_ban' => str_replace(' ','-',$request->blog_category_name_ban),
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('blog.category')->with($notification);
    }

    public function blogCategoryDelete($id){
        BlogPostCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
