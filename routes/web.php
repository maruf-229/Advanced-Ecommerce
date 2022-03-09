<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin' , 'middleware' => ['admin:admin']],function (){
    Route::get('/login' , [AdminController::class, 'loginForm']);
    Route::post('/login' , [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//admin all routes
Route::get('/admin/logout' , [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile' , [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit' , [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store' , [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password' , [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/change/password/update' , [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');



//user routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/' , [IndexController::class, 'index']);

Route::get('/user/logout' , [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile' , [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store' , [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password' , [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update' , [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

// Admin Brand routes
Route::prefix('brand')->group(function (){
    Route::get('/view' , [BrandController::class, 'brandView'])->name('all.brand');
    Route::post('/store' , [BrandController::class, 'brandStore'])->name('brand.store');
    Route::get('/edit/{id}' , [BrandController::class, 'brandEdit'])->name('brand.edit');
    Route::post('/update' , [BrandController::class, 'brandUpdate'])->name('brand.update');
    Route::get('/delete/{id}' , [BrandController::class, 'brandDelete'])->name('brand.delete');
});

// Admin Category routes
Route::prefix('category')->group(function (){
    Route::get('/view' , [CategoryController::class, 'categoryView'])->name('all.category');
    Route::post('/store' , [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/edit/{id}' , [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('/update' , [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('/delete/{id}' , [CategoryController::class, 'categoryDelete'])->name('category.delete');

    //Admin sub category all routes
    Route::get('/sub/view' , [SubCategoryController::class, 'sub_categoryView'])->name('all.sub_category');
    Route::post('/sub/store' , [SubCategoryController::class, 'sub_categoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}' , [SubCategoryController::class, 'sub_categoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update' , [SubCategoryController::class, 'sub_categoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}' , [SubCategoryController::class, 'sub_categoryDelete'])->name('subcategory.delete');

    //Admin sub-sub category all routes
    Route::get('/sub/sub/view' , [SubCategoryController::class, 'sub_sub_categoryView'])->name('all.sub_sub_category');

    Route::get('/subcategory/ajax/{category_id}' , [SubCategoryController::class, 'GetSubcategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}' , [SubCategoryController::class, 'GetSubSubcategory']);

    Route::post('/sub/sub/store' , [SubCategoryController::class, 'sub_sub_categoryStore'])->name('sub_subcategory.store');
    Route::get('/sub/sub/edit/{id}' , [SubCategoryController::class, 'sub_sub_categoryEdit'])->name('sub_subcategory.edit');
    Route::post('/sub/sub/update' , [SubCategoryController::class, 'sub_sub_categoryUpdate'])->name('sub_subcategory.update');
    Route::get('/sub/sub/delete/{id}' , [SubCategoryController::class, 'sub_sub_categoryDelete'])->name('sub_subcategory.delete');
});

// Admin Product routes
Route::prefix('product')->group(function (){
    Route::get('/add' , [ProductController::class, 'addProduct'])->name('add-product');
    Route::post('/store' , [ProductController::class, 'storeProduct'])->name('product_store');
    Route::get('/manage' , [ProductController::class, 'mngProduct'])->name('manage-product');
    Route::get('/edit/{id}' , [ProductController::class, 'editProduct'])->name('product.edit');
    Route::post('/data/update' , [ProductController::class, 'updateProductData'])->name('product_update');
    Route::post('/image/update' , [ProductController::class, 'MultiImageUpdate'])->name('update_product_image');
    Route::post('/thumbnail/update' , [ProductController::class, 'ThumbnailImageUpdate'])->name('update_product_thumbnail');
    Route::get('/multiImg/delete/{id}' , [ProductController::class, 'multiImgDelete'])->name('product.multiImg.delete');
    Route::get('/inactive/{id}' , [ProductController::class, 'productInactive'])->name('product.inactive');
    Route::get('/active/{id}' , [ProductController::class, 'productActive'])->name('product.active');
    Route::get('/delete/{id}' , [ProductController::class, 'productDelete'])->name('product.delete');

});

// Admin Slider routes
Route::prefix('slider')->group(function (){
    Route::get('/view' , [SliderController::class, 'sliderView'])->name('manage-slider');
    Route::post('/store' , [SliderController::class, 'sliderStore'])->name('slider.store');
    Route::get('/edit/{id}' , [SliderController::class, 'sliderEdit'])->name('slider.edit');
    Route::post('/update' , [SliderController::class, 'sliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}' , [SliderController::class, 'sliderDelete'])->name('slider.delete');

    Route::get('/inactive/{id}' , [SliderController::class, 'sliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}' , [SliderController::class, 'sliderActive'])->name('slider.active');
});
