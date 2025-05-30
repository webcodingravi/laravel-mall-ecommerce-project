<?php

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\backend\FaqController;
use App\Http\Controllers\ShowProductController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\ColorController;
use App\Http\Controllers\backend\OrdersController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\PartnerController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\DiscountCodeController;
use App\Http\Controllers\backend\ShippingChargeController;
use App\Http\Controllers\backend\BlogCategoryController;
use App\Http\Controllers\backend\BlogController;

// Backend route
Route::prefix('/admin')->group(function() {
// Backend Auth route
Route::get('/',[AuthController::class,'admin_login'])->name('login');
Route::post('/login',[AuthController::class,'AdminLoginProcess'])->name('login.process');

Route::group(['middleware' => 'admin'], function() {
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

// admin route
Route::get('/admin/list',[AdminController::class,'index'])->name('admin.list');
Route::get('/admin/create',[AdminController::class,'create'])->name('admin.create');
Route::post('/admin/store',[AdminController::class,'store'])->name('admin.store');
Route::get('/admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
Route::put('/admin/update/{id}',[AdminController::class,'update'])->name('admin.update');
Route::get('/admin/delete/{id}',[AdminController::class,'destroy'])->name('admin.delete');


// customer route
Route::get('/customer/list',[AdminController::class,'customer_list'])->name('customer.list');
Route::get('/customer/delete/{id}',[AdminController::class,'customer_delete'])->name('customer.delete');


// category route
Route::get('/category/list',[CategoryController::class,'index'])->name('category.list');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');


// sub category route
Route::get('/sub-category/list',[SubCategoryController::class,'index'])->name('sub-category.list');
Route::get('/sub-category/create',[SubCategoryController::class,'create'])->name('sub-category.create');
Route::post('/sub-category/store',[SubCategoryController::class,'store'])->name('sub-category.store');
Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('sub-category.edit');
Route::put('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('sub-category.update');
Route::get('/sub-category/delete/{id}',[SubCategoryController::class,'destroy'])->name('sub-category.delete');


// Brand Name route
Route::get('/brand/list',[BrandController::class,'index'])->name('brand.list');
Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
Route::put('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
Route::get('/brand/delete/{id}',[BrandController::class,'destroy'])->name('brand.delete');


// Color route
Route::get('/color/list',[ColorController::class,'index'])->name('color.list');
Route::get('/color/create',[ColorController::class,'create'])->name('color.create');
Route::post('/color/store',[ColorController::class,'store'])->name('color.store');
Route::get('/color/edit/{id}',[ColorController::class,'edit'])->name('color.edit');
Route::put('/color/update/{id}',[ColorController::class,'update'])->name('color.update');
Route::get('/color/delete/{id}',[ColorController::class,'destroy'])->name('color.delete');


// Product route
Route::get('/product/list',[ProductController::class,'index'])->name('product.list');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('product/delete/{id}',[ProductController::class,'destroy'])->name('product.delete');
Route::get('/product/image_delete/{id}',[ProductController::class,'ImageDelete'])->name('ImageDelete');
Route::post('/product/product_image_sortable',[ProductController::class,'ProductImageSortable'])->name('ProductImageSortable');
Route::post('/get_sub_category',[ProductController::class,'getSubCategory'])->name('getSubCategory');



// Discount code route
Route::get('/discount/list',[DiscountCodeController::class,'index'])->name('discount.list');
Route::get('/discount/create',[DiscountCodeController::class,'create'])->name('discount.create');
Route::post('/discount/store',[DiscountCodeController::class,'store'])->name('discount.store');
Route::get('/discount/edit/{id}',[DiscountCodeController::class,'edit'])->name('discount.edit');
Route::put('/discount/update/{id}',[DiscountCodeController::class,'update'])->name('discount.update');
Route::get('/discount/delete/{id}',[DiscountCodeController::class,'destroy'])->name('discount.delete');

// Shipping Charge route
Route::get('/shipping/list',[ShippingChargeController::class,'index'])->name('shipping.list');
Route::get('/shipping/create',[ShippingChargeController::class,'create'])->name('shipping.create');
Route::post('/shipping/store',[ShippingChargeController::class,'store'])->name('shipping.store');
Route::get('/shipping/edit/{id}',[ShippingChargeController::class,'edit'])->name('shipping.edit');
Route::put('/shipping/update/{id}',[ShippingChargeController::class,'update'])->name('shipping.update');
Route::get('/shipping/delete/{id}',[ShippingChargeController::class,'destroy'])->name('shipping.delete');

// Orders route
Route::get('/orders/list',[OrdersController::class,'index'])->name('orders.list');
Route::get('/orders/details/{id}',[OrdersController::class,'details'])->name('orders.details');
Route::get('/orders/status',[OrdersController::class,'order_status'])->name('orders.order_status');
Route::get('/orders/delete/{id}',[OrdersController::class,'destory'])->name('orders.delete');


// Slider route
Route::get('/slider/list',[SliderController::class,'index'])->name('slider.list');
Route::get('/slider/create',[SliderController::class,'create'])->name('slider.create');
Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
Route::put('/slider/update/{id}',[SliderController::class,'update'])->name('slider.update');
Route::get('/slider/delete/{id}',[SliderController::class,'destroy'])->name('slider.delete');


// Partner logo route
Route::get('/partner/list',[PartnerController::class,'index'])->name('partner.list');
Route::get('/partner/create',[PartnerController::class,'create'])->name('partner.create');
Route::post('/partner/store',[PartnerController::class,'store'])->name('partner.store');
Route::get('/partner/edit/{id}',[PartnerController::class,'edit'])->name('partner.edit');
Route::put('/partner/update/{id}',[PartnerController::class,'update'])->name('partner.update');
Route::get('/partner/delete/{id}',[PartnerController::class,'destroy'])->name('partner.delete');


// Page route
Route::get('/page/list',[PageController::class,'index'])->name('page.list');
Route::get('/page/edit/{id}',[PageController::class,'edit'])->name('page.edit');
Route::put('/page/update/{id}',[PageController::class,'update'])->name('page.update');

// system setting route
Route::get('/setting',[PageController::class,'SystemSetting'])->name('SystemSetting');
Route::post('/setting-update',[PageController::class,'UpdateSystemSetting'])->name('UpdateSystemSetting');


// contact us route
Route::get('/contact-us',[PageController::class,'ContactUs'])->name('contact.list');
Route::get('/contact-us/delete/{id}',[PageController::class,'ContactDestory'])->name('contact.delete');




// Faq route
Route::get('/faq/list',[FaqController::class,'index'])->name('faq.list');
Route::get('/faq/create',[FaqController::class,'create'])->name('faq.create');
Route::post('/faq/store',[FaqController::class,'store'])->name('faq.store');
Route::get('/faq/edit/{id}',[FaqController::class,'edit'])->name('faq.edit');
Route::put('/faq/update/{id}',[FaqController::class,'update'])->name('faq.update');
Route::get('/faq/delete/{id}',[FaqController::class,'destroy'])->name('faq.delete');



// Blog Category
Route::get('/blog-category/list',[BlogCategoryController::class,'index'])->name('BlogCategory.list');
Route::get('/blog-category/create',[BlogCategoryController::class,'create'])->name('BlogCategory.create');
Route::post('/blog-category/store',[BlogCategoryController::class,'store'])->name('BlogCategory.store');
Route::get('/blog-category/edit/{id}',[BlogCategoryController::class,'edit'])->name('BlogCategory.edit');
Route::put('/blog-category/update/{id}',[BlogCategoryController::class,'update'])->name('BlogCategory.update');
Route::get('/blog-category/delete/{id}',[BlogCategoryController::class,'destroy'])->name('BlogCategory.delete');

// Blog
Route::get('/blog/list',[BlogController::class,'index'])->name('blog.list');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');
Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
Route::put('/blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
Route::get('/blog/delete/{id}',[BlogController::class,'destroy'])->name('blog.delete');




});

// logout route
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

// Get Slug Route
Route::get('/getSlug',function(Request $request) {
    $slug = '';
    if(!empty($request->title)) {
        $slug = Str::slug($request->title);
    }
    return response([
        'status' => true,
       'slug'=> $slug
    ]);
  })->name('slug');




});


// User Account Route
Route::group(['middleware' => 'user'],function() {
Route::prefix('/user')->group(function() {
Route::get('/dashboard',[UserController::class,'dashboard'])->name('user_dashboard');
Route::get('/orders',[UserController::class,'orders'])->name('user_orders');
Route::get('/orders/{id}',[UserController::class,'user_order_details'])->name('user_order_details');

Route::get('/edit-profile',[UserController::class,'EditProfile'])->name('edit-profile');
Route::post('/update-profile',[UserController::class,'UpdateProfile'])->name('UserUpdateProfile');
Route::get('/change-password',[UserController::class,'ChangePassword'])->name('change-password');
Route::post('/update-password',[UserController::class,'UpdatePassword'])->name('update-password');


// Add to wishlisht
Route::post('/add-to-wishlist',[UserController::class,'AddToWishlist'])->name('AddToWishlist');
Route::post('/add-to-wishlist',[UserController::class,'AddToWishlist'])->name('AddToWishlist');
Route::post('/make-review',[UserController::class,'MakeReview'])->name('MakeReview');
Route::get('/my-wishlist',[ShowProductController::class,'MyWishlist'])->name('MyWishlist');


});

});


// frontend Route

Route::get('/',[FrontController::class,'home'])->name('home');
Route::post('/recent-arrival-category-product',[FrontController::class,'ArrivalProduct'])->name('ArrivalProduct');
Route::get('/about-us',[FrontController::class,'About'])->name('about');
Route::get('/contact-us',[FrontController::class,'Contact'])->name('contact');
Route::post('/contact-us',[FrontController::class,'SubmitContact'])->name('SubmitContact');
Route::get('/faq',[FrontController::class,'Faq'])->name('faq');
Route::get('/payment-methods',[FrontController::class,'PaymentMethod'])->name('PaymentMethod');
Route::get('/money-back',[FrontController::class,'MoneyBack'])->name('MoneyBack');
Route::get('/returns',[FrontController::class,'Returns'])->name('Returns');
Route::get('/shipping',[FrontController::class,'Shipping'])->name('Shipping');
Route::get('/terms-conditions',[FrontController::class,'TermsConditions'])->name('TermsConditions');
Route::get('/privacy-policy',[FrontController::class,'PrivacyPolicy'])->name('PrivacyPolicy');




Route::post('/user-login',[AuthController::class,'user_login'])->name('UserLogin');
Route::post('/user-register',[AuthController::class,'user_register'])->name('UserRegister');
Route::get('/verify/{id}',[AuthController::class,'verify_email']);

Route::get('/forgot-password',[AuthController::class,'forgot_password'])->name('forgotPassword');
Route::post('/process-forgot-password',[AuthController::class,'ProcessForgotPassword'])->name('ProcessForgotPassword');
Route::get('/reset/{token}',[AuthController::class,'reset_password']);
Route::post('/process-reset/{token}',[AuthController::class,'ProcessResetPassword'])->name('ProcessResetPassword');

Route::get('/cart',[AddToCartController::class,'cart'])->name('cart');
Route::get('/cart/delete/{id}',[AddToCartController::class,'CartDelete'])->name('CartDelete');
Route::post('/cart-update',[AddToCartController::class,'CartUpdate'])->name('CartUpdate');
Route::get('/checkout',[AddToCartController::class,'checkout'])->name('checkout');

Route::post('/checkout/apply-discount-code',[AddToCartController::class,'ApplyDiscountCode'])->name('ApplyDiscountCode');

Route::post('/checkout/place_order',[AddToCartController::class,'PlaceOrder'])->name('PlaceOrder');

Route::get('/checkout/payment',[AddToCartController::class,'checkout_payment'])->name('checkout_payment');

Route::get('/paypal/success-payment',[AddToCartController::class,'paypalSuccessPayment'])->name('paypalSuccessPayment');

Route::get('/stripe/payment-success',[AddToCartController::class,'stripeSuccessPayment'])->name('stripeSuccessPayment');


Route::post('/product/add-to-cart',[AddToCartController::class,'AddToCart'])->name('AddToCart');
Route::get('search',[ShowProductController::class,'getProductSearch'])->name('getProductSearch');
Route::get('{categorySlug?}/{subCategoryslug?}',[ShowProductController::class,'ShowProduct'])->name('ShowProduct');
Route::post('/filter-product',[ShowProductController::class,'FilterProduct'])->name('FilterProduct');
