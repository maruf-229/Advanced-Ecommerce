<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request,$product_id){
        if (Auth::check()){
            $exist = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exist){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);

                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            }
            else{
                return response()->json(['error' => 'Product Already Added On Your Wishlist']);
            }

        }else{
            return response()->json(['error' => 'At First Login To Your Account']);
        }
    }

    public function viewWishlist(){
        return view('frontend.wishlist.view_wishlist');
    }

    public function getWishlistProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();

        return response()->json($wishlist);
    }

    public function removeWishlistProduct($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Successfully Product Remove From Your Wishlist']);
    }
}
