<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

    //blog post all methods
    public function viewBlogPost(){
        $blog_post = BlogPost::with('category')->latest()->get();
        return view('backend.blog.post.post_view',compact('blog_post'));
    }

    public function addBlogPost(){
        $blog_category = BlogPostCategory::latest()->get();
        return view('backend.blog.post.post_add',compact('blog_category'));
    }

    public function storeBlogPost(Request $request){
        $request->validate([
            'category_id' => 'required',
            'post_title_en' => 'required',
            'post_title_ban' => 'required',
            'post_image' => 'required',
            'post_details_en' => 'required',
            'post_details_ban' => 'required',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/blog_post/'.$name_gen);
        $save_url = 'upload/blog_post/'.$name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_ban' => $request->post_title_ban,
            'post_slug_en' => strtolower(str_replace(' ','-',$request->post_title_en)),
            'post_slug_ban' => str_replace(' ','-',$request->post_title_ban),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_ban' => $request->post_details_ban,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.post')->with($notification);
    }

    public function blogPostEdit($id){
        $blog_post = BlogPost::findOrFail($id);
        $blog_category = BlogPostCategory::latest()->get();
        return view('backend.blog.post.post_edit',compact('blog_post','blog_category'));
    }

    public function blogPostUpdate(Request $request){
        $request->validate([
            'category_id' => 'required',
            'post_title_en' => 'required',
            'post_title_ban' => 'required',
            'post_image' => 'required',
            'post_details_en' => 'required',
            'post_details_ban' => 'required',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/blog_post/'.$name_gen);
        $save_url = 'upload/blog_post/'.$name_gen;
        $id = $request->id;

        BlogPost::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_ban' => $request->post_title_ban,
            'post_slug_en' => strtolower(str_replace(' ','-',$request->post_title_en)),
            'post_slug_ban' => str_replace(' ','-',$request->post_title_ban),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_ban' => $request->post_details_ban,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.post')->with($notification);
    }

    public function blogPostDelete($id){
        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Post Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
