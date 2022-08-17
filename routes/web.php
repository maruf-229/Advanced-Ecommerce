<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishlistController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin' , 'middleware' => ['admin:admin']],function (){
    Route::get('/login' , [AdminController::class, 'loginForm']);
    Route::post('/login' , [AdminController::class, 'store'])->name('admin.login');
});

//admin all routes
Route::get('/admin/logout' , [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile' , [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit' , [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store' , [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password' , [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/change/password/update' , [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

Route::middleware(['auth:admin'])->group(function (){

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

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

    // Admin Coupon routes
    Route::prefix('coupons')->group(function (){
        Route::get('/view' , [CouponController::class, 'couponView'])->name('manage-coupons');
        Route::post('/store' , [CouponController::class, 'couponStore'])->name('coupon.store');
        Route::get('/edit/{id}' , [CouponController::class, 'editCoupon'])->name('coupon.edit');
        Route::post('/update{id}' , [CouponController::class, 'couponUpdate'])->name('coupon.update');
        Route::get('/delete/{id}' , [CouponController::class, 'couponDelete'])->name('coupon.delete');
    });

    // Admin Shipping routes
    Route::prefix('shipping')->group(function (){
        //ship division
        Route::get('/division/view' , [ShippingAreaController::class, 'divisionView'])->name('manage-division');
        Route::post('/division/store' , [ShippingAreaController::class, 'divisionStore'])->name('division.store');
        Route::get('/division/edit/{id}' , [ShippingAreaController::class, 'editDivision'])->name('division.edit');
        Route::post('/division/update{id}' , [ShippingAreaController::class, 'divisionUpdate'])->name('division.update');
        Route::get('/division/delete/{id}' , [ShippingAreaController::class, 'divisionDelete'])->name('division.delete');

        //ship district
        Route::get('/district/view' , [ShippingAreaController::class, 'districtView'])->name('manage-district');
        Route::post('/district/store' , [ShippingAreaController::class, 'districtStore'])->name('district.store');
        Route::get('/district/edit/{id}' , [ShippingAreaController::class, 'editDistrict'])->name('district.edit');
        Route::post('/district/update{id}' , [ShippingAreaController::class, 'districtUpdate'])->name('district.update');
        Route::get('/district/delete/{id}' , [ShippingAreaController::class, 'districtDelete'])->name('district.delete');

        //ship state
        Route::get('/state/view' , [ShippingAreaController::class, 'stateView'])->name('manage-state');
        Route::post('/state/store' , [ShippingAreaController::class, 'stateStore'])->name('state.store');
        Route::get('/state/edit/{id}' , [ShippingAreaController::class, 'editState'])->name('state.edit');
        Route::post('/state/update{id}' , [ShippingAreaController::class, 'stateUpdate'])->name('state.update');
        Route::get('/state/delete/{id}' , [ShippingAreaController::class, 'stateDelete'])->name('state.delete');
    });

    // Admin orders routes
    Route::prefix('orders')->group(function (){
        Route::get('/pending/orders' , [OrderController::class, 'pendingOrders'])->name('pending-orders');
        Route::get('/pending/order/details/{order_id}' , [OrderController::class, 'pendingOrderDetails'])->name('pending.order.details');

        Route::get('/confirmed/orders' , [OrderController::class, 'confirmedOrders'])->name('confirmed-orders');

        Route::get('/processing/orders' , [OrderController::class, 'processingOrders'])->name('processing-orders');

        Route::get('/picked/orders' , [OrderController::class, 'pickedOrders'])->name('picked-orders');

        Route::get('/shipped/orders' , [OrderController::class, 'shippedOrders'])->name('shipped-orders');

        Route::get('/delivered/orders' , [OrderController::class, 'deliveredOrders'])->name('delivered-orders');

        Route::get('/cancelled/orders' , [OrderController::class, 'cancelledOrders'])->name('cancelled-orders');

        //update order status
        Route::get('/pending/confirm/{order_id}' , [OrderController::class, 'pendingToConfirm'])->name('pending-confirm');
        Route::get('/confirm/processing/{order_id}' , [OrderController::class, 'confirmToProcessing'])->name('confirm-processing');
        Route::get('/processing/picked/{order_id}' , [OrderController::class, 'processingToPicked'])->name('processing-picked');
        Route::get('/picked/shipped/{order_id}' , [OrderController::class, 'pickedToShipped'])->name('picked-shipped');
        Route::get('/shipped/delivered/{order_id}' , [OrderController::class, 'shippedToDelivered'])->name('shipped-delivered');
        Route::get('/delivered/cancelled/{order_id}' , [OrderController::class, 'deliveredToCancelled'])->name('delivered-cancelled');

        //admin invoice download
        Route::get('/invoice/download/{order_id}' , [OrderController::class, 'adminInvoiceDownload'])->name('invoice.download');
    });

    // Admin reports routes
    Route::prefix('reports')->group(function (){
        Route::get('/view' , [ReportController::class, 'reportView'])->name('all-reports');
        Route::post('/search/by/date' , [ReportController::class, 'reportByDate'])->name('search_by_date');
        Route::post('/search/by/month' , [ReportController::class, 'reportByMonth'])->name('search_by_month');
        Route::post('/search/by/year' , [ReportController::class, 'reportByYear'])->name('search_by_year');

    });

    // Admin All Users routes
    Route::prefix('all-user')->group(function (){
        Route::get('/view' , [AdminProfileController::class, 'AllUsers'])->name('all-users');
    });

});


//frontend all routes
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

//multiple language all routes
Route::get('/language/english' , [LanguageController::class, 'english'])->name('english.language');
Route::get('/language/bangla' , [LanguageController::class, 'bangla'])->name('bangla.language');

//frontend product details page
Route::get('/product/details/{id}/{slug}' , [IndexController::class, 'productDetails']);

//frontend tag wise product page
Route::get('/product/tag/{tag}' , [IndexController::class, 'tagWiseProduct']);

//frontend subcategory wise product data
Route::get('/subcategory/product/{subcat_id}/{slug}' , [IndexController::class, 'subCatWiseProduct']);

//frontend subcategory wise product data
Route::get('/sub-subcategory/product/{sub_subcat_id}/{slug}' , [IndexController::class, 'sub_subCatWiseProduct']);

//product view modal with ajax
Route::get('/product/view/modal/{id}' , [IndexController::class, 'productViewAjax']);

//add to cart store data
Route::post('/cart/data/store/{id}' , [CartController::class, 'addToCart']);

//get mini cart data
Route::get('/product/mini/cart/' , [CartController::class, 'addMiniCart']);

//remove mini cart
Route::get('/minicart/product-remove/{rowId}' , [CartController::class, 'removeMiniCart']);

//add to wishlist store data
Route::post('/add-to-wishlist/{product_id}' , [WishlistController::class, 'addToWishlist']);


Route::group(['prefix' => 'user','middleware' => ['user','auth'],'namespace' => 'User'],
function (){

    //wishlist page
    Route::get('/wishlist' , [WishlistController::class, 'viewWishlist'])->name('wishlist');

    //get wishlist product
    Route::get('/get-wishlist-product' , [WishlistController::class, 'getWishlistProduct']);

    //remove wishlist product
    Route::get('/wishlist-remove/{id}' , [WishlistController::class, 'removeWishlistProduct']);

    //stripe payment
    Route::post('/stripe/order' , [StripeController::class, 'stripeOrder'])->name('stripe.order');

    //cash payment
    Route::post('/cash/order' , [CashController::class, 'cashOrder'])->name('cash.order');

    //User orders
    Route::get('/my/orders' , [AllUserController::class, 'myOrders'])->name('my.orders');
    Route::get('/order-details/{order_id}' , [AllUserController::class, 'orderDetails']);
    Route::get('/invoice-download/{order_id}' , [AllUserController::class, 'invoiceDownload']);

    //return order routes
    Route::post('/return/order/{order_id}' , [AllUserController::class, 'returnOrder'])->name('return.order');
    Route::get('/return/order/list' , [AllUserController::class, 'returnOrderList'])->name('return.order.list');
    Route::get('/cancel/orders' , [AllUserController::class, 'cancelOrders'])->name('cancel.orders');

});

//cart page
Route::get('/my-cart' , [CartPageController::class, 'myCart'])->name('my_cart');

//get cart data
Route::get('/user/get-cart-product' , [CartPageController::class, 'getCartProduct']);

//cart remove
Route::get('/user/cart-remove/{rowId}' , [CartPageController::class, 'removeCartProduct']);

//cart increment
Route::get('/cart-increment/{rowId}' , [CartPageController::class, 'cartIncrement']);
//cart decrement
Route::get('/cart-decrement/{rowId}' , [CartPageController::class, 'cartDecrement']);

//Frontend Coupon Option
Route::post('/coupon-apply' , [CartController::class, 'couponApply']);

Route::get('/coupon-calculation' , [CartController::class, 'couponCalculation']);

Route::get('/coupon-remove' , [CartController::class, 'couponRemove']);

//checkout routes
Route::get('/checkout', [CartController::class, 'checkoutCreate'])->name('checkout');

Route::get('/district-get/ajax/{division_id}' , [CheckoutController::class, 'districtGetAjax']);

Route::get('/state-get/ajax/{district_id}' , [CheckoutController::class, 'stateGetAjax']);

Route::post('/checkout/store' , [CheckoutController::class, 'checkoutStore'])->name('checkout.store');
