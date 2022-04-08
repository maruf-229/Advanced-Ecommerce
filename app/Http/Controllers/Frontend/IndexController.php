<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();

        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();

//        return $skip_category->id;
//        die();

        return view('frontend.index',compact('categories','sliders','products',
            'featured','hot_deals','special_offer','special_deals', 'skip_category_0','skip_product_0',
            'skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1'));
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }

    public function UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldPassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    }

    public function productDetails($id,$slug){
        $product = Product::findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        $color_ban = $product->product_color_ban;
        $product_color_ban = explode(',',$color_ban);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);

        $size_ban = $product->product_size_ban;
        $product_size_ban = explode(',',$size_ban);

        $multiImg = MultiImg::where('product_id',$id)->get();

        $cat_id = $product->category_id;
        $related_product = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        return view('frontend.product.product_details',
            compact('product','multiImg','product_color_en','product_color_ban','product_size_en','product_size_ban','related_product'));
    }

    public function tagWiseProduct($tag){
        $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_ban',$tag)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tags.tags_view',compact('products','categories'));
    }


    //subcategory wise product data
    public function subCatWiseProduct($subcat_id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(6);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.subcategory_view',compact('products','categories'));
    }

    //sub-subcategory wise product data
    public function sub_subCatWiseProduct($sub_subcat_id,$slug){
        $products = Product::where('status',1)->where('sub_subcategory_id',$sub_subcat_id)->orderBy('id','DESC')->paginate(6);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.sub_subcategory_view',compact('products','categories'));
    }
}
