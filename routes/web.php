<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','FrontController@index');
Route::get('shops','ProductController@productShop');
Route::get('shops-1','ProductController@productShop_1');
Route::get('product/detail/{id}','ProductController@productDetail');
Route::get('shops-by-category/{id}','ProductController@productShopByCategory');
Route::get('shops-by-brand/{id}','ProductController@productShopByBrand');

Route::get('price/by/color/{id}','ProductController@priceByColor');
Route::get('price/by/size/{id}','ProductController@priceBySize');


Route::get('customer-signup','CustomerAuthController@customerRigester');
Route::post('customer-signup','CustomerAuthController@customerLoginRegister');
Route::post('customer-login','CustomerAuthController@customerLogin');
Route::get('logout','CustomerAuthController@customerLogout');


Route::get('blog/detail/{id}','BlogController@singleBlogDetail');

Route::get('stock/by-size/{product_id}/{size_id}','ProductController@stockGetBySize');
Route::get('size/by-color/{color_id}','ProductController@getSizeByColor');




// product fileter routes
Route::match(['GET','POST'],'color-filter','ProductController@colorFilter');
Route::match(['GET','POST'],'size-filter','ProductController@sizeFilter');
Route::match(['GET','POST'],'brand-filter','ProductController@brandFilter');
Route::match(['GET','POST'],'category-filter','ProductController@categoryFilter');
Route::match(['GET','POST'],'price-short','ProductController@priceShort');


// cart routes
Route::get('shopping-cart','CartController@index');
Route::get('cart/item/list','CartController@getCartItems');
Route::post('add-to-cart','CartController@productAddToCart');
Route::get('cart/update-qty/{id}/{qty}','CartController@updateQtyOfCartItem');
Route::get('remove/cart/item/{id}','CartController@cartItemRemove');
Route::post('apply/coupon-code','CartController@applyCouponCode');
Route::get('api/remove/cart/item/{id}','CartController@cartItemRemoveApi');

// search product route 
Route::match(['GET','POST'],'search-product','ProductController@searchProduct')->name('search.product');

// page Routes

Route::get('about-us','PageController@aboutUs');
Route::get('contact-us','PageController@contactUs');
Route::get('terms-and-condition','PageController@termsAndCondition');

// wishlist route

Route::match(['GET','POST'],'wishlists','CustomerAuthController@wishList');
Route::get('add-to-withlist/{product_id}','CustomerAuthController@AddProductToWishlist');

// forget password
Route::match(['GET','POST'],'forget-password','CustomerAuthController@forgetPassword');
Route::match(['GET','POST'],'change-password','CustomerAuthController@changePassword');

// newsletter 
Route::post('add-email','NewsletterController@addEmail');



// Customer auth routes
Route::group(['middleware' => ['front']], function () {
    Route::match(['GET','POST'],'my-profile','CustomerAuthController@customerProfile');
    Route::get('my-order','CustomerAuthController@customerOrder');
    Route::get('my-order/detail/{id}','CustomerAuthController@customerOrderDetail');
    Route::get('checkout','CustomerAuthController@checkout');
    Route::post('checkout','CustomerAuthController@placeOrderStore');
    Route::get('shipping-charge/{district}','CustomerAuthController@getShippingCharge');
    Route::post('customer-messages','CustomerAuthController@customerMessage');
    Route::get('remove-wishlist-item/{id}','CustomerAuthController@removeWishlistItem');

});



    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => 'auth','prefix' => 'dashboard'],  function()
    {
         Route::get('/','Admin\AdminController@index');

        //  main attr
          Route::resource('color', 'Admin\ColorController');
        // sub attr
          Route::resource('size', 'Admin\SizeController');
        // main cat,
          Route::resource('maincat', 'Admin\MaincatController');
        // brand
          Route::resource('brand', 'Admin\BrandController');
        // product
          Route::resource('product', 'Admin\ProductController');
        // Product Gallery image delete
          Route::get('/image/delete/{image_id}/','Admin\ProductController@GalleryImageDelete')->name('gallery.image.delete');

        //   manage product stock
           Route::get('/manage/stock/{product_id}','Admin\StockController@manageStock')->name('manage.stock');
           Route::post('/manage/stock/{product_id}','Admin\StockController@manageStockStore');

        //    coupon routes
           Route::resource('coupon', 'Admin\CouponController');

        // shipping route
           Route::resource('shipping', 'Admin\ShippingController');

        // order manage routes
           Route::get('/customer-pending-order', 'Admin\OrderController@pendingOrder');
           Route::get('/pending-order-detail/{id}', 'Admin\OrderController@pendingOrderDetail');
           Route::get('/customer-complete-order', 'Admin\OrderController@completeOrder');
           Route::get('/complete-order-detail/{id}', 'Admin\OrderController@completeOrderDetail');

           Route::post('/response-message', 'Admin\OrderController@responseMessage');

        // front setting route
           Route::get('banners', 'Admin\BannerController@index');
           Route::match(['GET','POST'],'banner/edit/{id}','Admin\BannerController@topBanner');
           Route::match(['GET','POST'],'about-info','Admin\FrontSettingController@aboutInfo');
           Route::match(['GET','POST'],'terms-and-condition-info','Admin\FrontSettingController@termsAndConditionInfo');
           Route::resource('store', 'Admin\StoreController');
           Route::match(['GET','POST'],'basic-info','Admin\FrontSettingController@basicInfo');
           Route::match(['GET','POST'],'popup-info','Admin\FrontSettingController@popupBoxInfo');


        
        // slider route 
           Route::resource('slider', 'Admin\SliderController');
        
        // customer info
           Route::get('customer-message', 'Admin\CustomerController@customerMessage');
           Route::get('seen-message/{id}', 'Admin\CustomerController@messageSeen');
           Route::get('customer-list', 'Admin\CustomerController@customerList');

         // setting routes
           Route::match(['GET','POST'],'change-password','Admin\SettingController@changePassword');
           Route::match(['GET','POST'],'social-media','Admin\SettingController@socialMedia');

          // blog route
           Route::resource('blog', 'Admin\BlogController');

          //  newsletter subscribe
          Route::match(['GET','POST'],'subscriber','Admin\SettingController@subscriber');

           

    });


