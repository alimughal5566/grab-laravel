<?php
//page not found
Route::fallback(function () {
    return view('user.404');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

//Reoptimized class loader:
// Route::get('/optimize', function() {
//     $exitCode = Artisan::call('optimize');
//     return '<h1>Reoptimized class loader</h1>';
// });

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//admin Auth
Route::get('/admin', 'Admin\DashboardController@index')->name('admin.login');
Route::post('admin', 'Admin\DashboardController@login')->name('admin.login.post');


// Route::group(['middleware' => 'frontend.Auth'], function () {
   Auth::routes();
// Route::get('/user', 'User\UserController@index')->middleware('frontendAuth');
 Route::get('/user', 'User\UserController@index');

// });


Route::middleware(['Admin.Auth'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {



    //dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    //Change Password
    Route::get('changePassword', 'DashboardController@changePassword')->name('changePassword');
    //change password
    Route::post('changePassword', 'DashboardController@PasswordUpdate')->name('changePassword');


    //logout
    Route::post('logout', 'DashboardController@logout')->name('logout');

    //GENERAL SETTING START*********************************************************************************************
    //basic settings
    Route::get('basicSettings', 'GeneralSettingController@basicSettings')->name('basicSettings');
    //basic pro
    Route::post('basicSettings', 'GeneralSettingController@BasicSettingsPro')->name('basicSettingsPro');



    //SMS settings
    Route::get('smsSettings', 'GeneralSettingController@SmsSettings')->name('SmsSettings');
    //SMS Settings pro
    Route::post('smsSettings', 'GeneralSettingController@SmsSettingsPro')->name('SmsSettingsPro');


    //Email settings
    Route::get('emailSettings', 'GeneralSettingController@EmailSettings')->name('emailSettings');
    //Email Settings pro
    Route::post('emailSettings', 'GeneralSettingController@EmailSettingsPro')->name('emailSettingsPro');

//GENERAL SETTING END***************************************************************************************************

 //Front End Setting Start***********************************************************************************

    //logo+icon+banner
    Route::get('banner', 'FrontEndController@BannerLogoIcon')->name('banner');
    Route::post('banner', 'FrontEndController@BannerLogoIconStore')->name('banner');

    //About setting
    Route::get('aboutSetting', 'FrontEndController@showAboutSettings')->name('aboutSettings');
    Route::post('aboutSetting', 'FrontEndController@AboutSettings')->name('aboutSettings');

    //Testimonial
    Route::resource('testimonial', 'TestimonialController');

    //Food category
    Route::resource('foodCategory', 'FoodCategoryController');

    //Food Items
    Route::resource('foods', 'FoodItemsController');
   //food titles
     Route::post('foodTitles', 'FrontEndController@FoodTitles')->name('foodTitles');

    //Our Chef
    Route::resource('OurChefs', 'OurChefController');

    //blog Category
    Route::resource('blogCategory', 'BlogCategoryController');

    //blog Category
    Route::resource('post', 'BlogPostController');

    //footer
    Route::get('footer', 'FrontEndController@ShowSettings')->name('footerSettings');
    Route::post('footer', 'FrontEndController@FooterSettings')->name('footerSettings');

    //Reservation
    Route::get('reservation', 'FrontEndController@ShowReservation')->name('reservation');
    Route::get('reservation-log', 'FrontEndController@ShowReservationLog')->name('reservationLog');

    Route::post('reservation', 'FrontEndController@ReservationSettings')->name('reservation');

    Route::get('reservationAccept/{id}', 'FrontEndController@ReservationAccept')->name('reservationAccept');
    Route::get('reservationDelete/{id}', 'FrontEndController@ReservationDelete')->name('reservationDelete');

    Route::get('reservation-page', 'FrontEndController@ShowReservationPage')->name('reservationPage');

    //Social settings
    Route::get('social-settings', 'FrontEndController@showSocialSettings')->name('social_setting');
    Route::post('social-settings', 'FrontEndController@storeSocialSettings')->name('social.create');
    Route::post('social-settings-update', 'FrontEndController@UpdateSocialSettings')->name('social.update');
    Route::post('social-delete', 'FrontEndController@SocialDestroy')->name('social.delete');


    //counter
    Route::get('counter', 'FrontEndController@showCounter')->name('counter');
    Route::post('counter', 'FrontEndController@storeCounter')->name('counter.create');
    Route::post('counter-delete', 'FrontEndController@CounterDestroy')->name('counter.delete');
    Route::post('counter-image', 'FrontEndController@storeCounterImage')->name('counter-image');

    //food Gallery
    Route::get('foodGallery', 'FrontEndController@ShowFoodGallery')->name('foodGallery');
    Route::post('foodGallery', 'FrontEndController@FoodGallery')->name('foodGallery');
    Route::get('foodGalleryDelete/{id}', 'FrontEndController@foodGalleryDelete')->name('foodGalleryDelete');

    //food page title
    Route::get('foodPageTitle', 'FrontEndController@ShowFoodPageTitle')->name('foodPageTitle');


    Route::get('manageaddons', 'FoodItemsController@manageaddons')->name('manageaddons');
    Route::get('addons', 'FoodItemsController@addnew_addons')->name('addons');
    Route::post('create_addon', 'FoodItemsController@add_addons')->name('create_addon');
    Route::get('/edit_addon/{id}','FoodItemsController@edit_addons');
    Route::put('/update_addon/{id}','FoodItemsController@update_addons');
    Route::post('/delete_addon','FoodItemsController@delete_addon');

    Route::get('listassignaddons', 'FoodItemsController@listassign_addons')->name('listassignaddons');
    Route::get('addassign_addons', 'FoodItemsController@addassign_addons')->name('addassign_addons');
    Route::post('assign_newaddon', 'FoodItemsController@newassign_addons')->name('assign_newaddon');
    Route::post('/delete_assignedaddon','FoodItemsController@delete_assignedaddon');

    Route::get('/edit_assignedaddon/{id}','FoodItemsController@edit_assignedaddon');
    Route::put('/update_assignedaddon/{id}','FoodItemsController@update_assignedaddon');

    Route::get('foodavailability', 'FoodItemsController@foodavailabilityindex')->name('foodavailability');
    Route::get('addavailability', 'FoodItemsController@addavailability')->name('addavailability');
    Route::post('storeavailability', 'FoodItemsController@storeavailability')->name('storeavailability');
    Route::post('/delete_availability','FoodItemsController@delete_availability');

    Route::get('/edit_availability/{id}','FoodItemsController@edit_availability');
    Route::put('/update_availability/{id}','FoodItemsController@update_availability');

    Route::get('plancategories', 'FoodItemsController@plancategories')->name('plancategories');
    Route::post('createplancategory', 'FoodItemsController@createplancategory')->name('createplancategory');

    Route::post('/updateplancat','FoodItemsController@updateplancat')->name('updateplancat');

    Route::post('/delete_plancategory','FoodItemsController@delete_plancategory');


    Route::get('plans', 'FoodItemsController@planslisting')->name('plans');
    Route::get('createplan', 'FoodItemsController@createplan')->name('createplan');
    Route::post('storeplan', 'FoodItemsController@storeplan')->name('storeplan');
    Route::get('/plan_edit/{id}','FoodItemsController@plan_edit');
    Route::put('/plan_update/{id}','FoodItemsController@plan_update');

    Route::post('/delete_plan','FoodItemsController@delete_plan');
    

    Route::get('/addplandays/{id}', 'FoodItemsController@addplandays');
    Route::get('/adddaysofplans/{id}', 'FoodItemsController@adddaysofplans');
    Route::post('storeplandayfood', 'FoodItemsController@storeplandayfood')->name('storeplandayfood');
    Route::get('/edit_plandayrecord/{id}/{day}','FoodItemsController@edit_plandayrecord');

    Route::put('/update_plandayrecord/{id}','FoodItemsController@update_plandayrecord');

    Route::post('/delete_plandays','FoodItemsController@delete_plandays');


    
    
    
    





    //Events
    Route::resource('events', 'EventsController');

    //contact
    Route::get('contact', 'FrontEndController@ShowContact')->name('contact');
    Route::post('contact', 'FrontEndController@ContactSetting')->name('contact');


    //order
    Route::get('orderList', 'FrontEndController@OrderList')->name('orderList');
    Route::get('orderHistory', 'FrontEndController@OrderHistory')->name('orderHistory');
    Route::post('orderRemove/{id}', 'FrontEndController@OrderRemove')->name('orderRemove');
    Route::get('orderAccept/{id}', 'FrontEndController@OrderAccept')->name('orderAccept');
    Route::get('orderDetails/{id}', 'FrontEndController@orderDetails')->name('orderDetails');


    //multiple title
    Route::post('event-title', 'FrontEndController@EventTitle')->name('EventTitle');
    Route::post('news-title', 'FrontEndController@NewsTitle')->name('NewsTitle');
    Route::post('chef-title', 'FrontEndController@chefTitle')->name('chefTitle');


    //Language
    Route::get('/language/manager', 'LanguageController@langManage')->name('language-manage');
    Route::post('/language/manager', 'LanguageController@langStore')->name('language-manage-store');
    Route::delete('language-manage/{id}', 'LanguageController@langDel')->name('language-manage-del');
    Route::get('language-key/{id}', 'LanguageController@langEdit')->name('language-key');
    Route::put('key-update/{id}', 'LanguageController@langUpdate')->name('key-update');
    Route::post('language-manage-update/{id}', 'LanguageController@langUpdatepp')->name('language-manage-update');
    Route::post('langImport', 'LanguageController@langImport')->name('import_lang');



});

Route::get('/home', 'HomeController@index')->name('home1');

Route::namespace('User')->name('user.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    //make reservation
    Route::post('reservation', 'HomeController@MakeReservation')->name('reservation');

    //About us
    Route::get('about', 'HomeController@ShowAbout')->name('about');

    //reservation
    Route::get('reservation', 'HomeController@ShowReservation')->name('reservation');

    //contact
    Route::get('contact', 'HomeController@ShowContact')->name('contact');
    Route::post('contact', 'HomeController@ContactMail')->name('contactMail');

    //add bilal
    Route::get('menu', 'HomeController@ShowMenu')->name('menu');
    Route::get('productdetail/{id}', 'HomeController@productdetail')->name('productdetail');
    
    //Route::get('productdetail', 'HomeController@ProductDetail')->name('productdetail');
    //Route::get('cart', 'HomeController@cart')->name('cart');
   
     Route::get('checkout', 'CartController@checkout')->name('checkout');
    
    Route::get('addToCart/{product}', 'ProductController@addToCart')->name('addToCart');
    Route::get('cart', 'CartController@cartShow')->name('cart');
    Route::get('delete-cart/{id}', 'CartController@removeCartProduct')->name('cart');
    Route::get('cart/update', 'CartController@update');
    Route::get('statusUpdate', 'CartController@statusUpdate')->name('statusUpdate');
    Route::get('account', 'CartController@userDashboard')->name('account');
    Route::get('ordersdetails/{id}', 'CartController@ordersDetails');
    Route::get('categoriespro/{id}', 'HomeController@categoriesPro');
    Route::get('pricefilter/', 'HomeController@priceFilter');
    Route::get('price-asc', 'HomeController@priceAsc');
    Route::get('price-desc', 'HomeController@priceDesc');

    Route::get('clear', 'CartController@clear');
   

    // new cart

    Route::post('cart-add', 'CartController@addToCart');
    Route::get('countProduct', 'CartController@countProduct');
    Route::post('storecustomer', 'OrderController@storeCustomer');
    Route::get('thank', 'CartController@checkoutFinal');




    //route for user login
  

    // Route::prefix('user')->group(function(){
    //     Route::get('login','Auth\UserLoginController@showLoginForm');
    //     Route::post('login','Auth\UserLoginController@login')->name('login-user');

    //     //'login-admin'
    // });
   
   Route::post('registeruser','UserController@create');
   Route::post('userlogin','UserController@login');
   Route::get('userlogout','UserController@logout');

    //send contact mail
    
    Route::get('searchfood', 'HomeController@searchFood');

    //////////Haseeb Routes Start//////
    Route::get('cat_plans/{id}', 'HomeController@plans_Ofcategories')->name('cat_plans');
    Route::get('plandetail/{id}/{planid}', 'HomeController@plandetail')->name('plandetail');
    Route::post('orderplan','HomeController@orderplan')->name('orderplan');
    Route::get('makemeal', 'HomeController@makemeal')->name('makemeal');
    Route::post('storemeal', 'HomeController@storemeal')->name('storemeal');
    
    //////////Haseeb Routes End/////// 


    //blog home page
    Route::get('announcement', 'HomeController@ShowBlog')->name('blog');
    Route::get('announcement/{slug}', 'HomeController@BlogDetails')->name('blogDetails');
    Route::get('category/{slug}', 'HomeController@BlogByCategory')->name('blogByCategory');

    //Events
    Route::get('events', 'HomeController@ShowEvents')->name('event');
    Route::get('events/{slug}', 'HomeController@EventDetails')->name('EventDetails');

    //all food
    Route::get('foods', 'HomeController@ShowFood')->name('foods');
    Route::get('foodDetails/{id}', 'HomeController@FoodDetails')->name('foodDetails');
    //food order
    Route::post('foodOrder/{id}', 'HomeController@FoodOrder')->name('foodOrder');
    //Gallery
    Route::get('gallery', 'HomeController@ShowGallery')->name('gallery');

});

//lang
Route::get('/change-lang/{lang}', 'User\HomeController@changeLang')->name('lang');



   
   