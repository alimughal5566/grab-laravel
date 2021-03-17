<?php
//page not found
Route::fallback(function () {
    return view('user.pages.4041');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

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


   Auth::routes();
 Route::get('/user', 'User\UserController@index');



Route::middleware(['Admin.Auth'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

Route::get('planorderprintdays/{uid}/{oid}/{pid}', 'FrontEndController@planorderprintdays')->name('planorderprintdays');
Route::get('planoptorder/{uid}/{oid}/{pid}', 'FrontEndController@planoptorder')->name('planoptorder');

Route::resource('admins', 'AdminController');
Route::get('adminseditmodal', 'AdminController@adminseditmodal');

//Make your own meal
    Route::get('meallist', 'FrontEndController@meallist')->name('meallist');
    Route::get('momorderdays/{mid}', 'FrontEndController@momorderdays')->name('momorderdays');
    Route::get('statusUpdatemom', 'FrontEndController@statusUpdatemom');
    Route::get('momorderprintdays/{mid}', 'FrontEndController@momorderprintdays')->name('momorderprintdays');
    Route::get('momstatusUpdate', 'FrontEndController@momstatusUpdate');

//Make your own meal



    Route::get('listaddonscat', 'FoodItemsController@listaddonscat')->name('listaddonscat');
    Route::post('createaddoncategory', 'FoodItemsController@createaddoncategory')->name('createaddoncategory');
    Route::post('/delete_addoncategory','FoodItemsController@delete_addoncategory');
    Route::post('/updateaddoncat','FoodItemsController@updateaddoncat')->name('updateaddoncat');

    Route::get('delivery', 'FrontEndController@delivery')->name('delivery');
    Route::post('deliverysave', 'FrontEndController@deliverysave')->name('deliverysave');

Route::get('statusUpdateplan', 'FrontEndController@statusUpdateplan');

    //dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::get('customers', 'DashboardController@customers')->name('customers');

    Route::get('showcustomerdetail', 'DashboardController@showcustomerdetail');

    Route::post('deletecustomer', 'DashboardController@deletecustomer');

    Route::post('delete_planoptionsmeal','FoodItemsController@delete_planoptionsmeal')->name('delete_planoptionsmeal');

    //Change Password
    Route::get('changePassword', 'DashboardController@changePassword')->name('changePassword');
    //change password
    Route::post('changePassword', 'DashboardController@PasswordUpdate')->name('changePassword');


    Route::get('statusUpdate', 'FrontEndController@statusUpdate')->name('statusUpdate');

    //About Slider
    Route::get('slider', 'FrontEndController@viewslider')->name('slider');
    Route::get('slidereditmodal', 'FrontEndController@slidereditmodal');
    Route::post('createslider','FrontEndController@createslider')->name('createslider');
    Route::post('delete_slider/{id}','FrontEndController@delete_slider')->name('delete_slider');
    Route::post('/sliderupdate','FrontEndController@sliderupdate');

    //logout
    Route::post('logout', 'DashboardController@logout')->name('logout');

    //GENERAL SETTING START
    //basic settings
    Route::get('basicSettings', 'GeneralSettingController@basicSettings')->name('basicSettings');
    //basic pro
    Route::post('basicSettings', 'GeneralSettingController@BasicSettingsPro')->name('basicSettingsPro');

    Route::get('bannerlist','EventsController@bannerlist')->name('bannerlist');
    Route::post('createbanner','EventsController@createbanner')->name('createbanner');
    Route::post('delete_banner','EventsController@delete_banner')->name('delete_banner');
    Route::put('/bannerupdate/{id}','EventsController@bannerupdate');

    //SMS settings
    Route::get('smsSettings', 'GeneralSettingController@SmsSettings')->name('SmsSettings');
    //SMS Settings pro
    Route::post('smsSettings', 'GeneralSettingController@SmsSettingsPro')->name('SmsSettingsPro');


    //Email settings
    Route::get('emailSettings', 'GeneralSettingController@EmailSettings')->name('emailSettings');
    //Email Settings pro
    Route::post('emailSettings', 'GeneralSettingController@EmailSettingsPro')->name('emailSettingsPro');

//GENERAL SETTING END

 //Front End Setting Start

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

    Route::get('planorderlist', 'FrontEndController@planorderlist')->name('planorderlist');
    Route::get('planorderdays/{uid}/{oid}/{pid}', 'FrontEndController@planorderdays')->name('planorderdays');
    Route::get('planoptionlist', 'FrontEndController@planoptionlist')->name('planoptionlist');
    Route::get('planooptionorder/{uid}/{oid}/{pid}', 'FrontEndController@planooptionorder')->name('planooptionorder');
    Route::get('statusUpdateplanorder', 'FrontEndController@statusUpdateplanorder');
    Route::get('statusUpdateplanoptionorder', 'FrontEndController@statusUpdateplanoptionorder');

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

    Route::get('planoptionmealdelete', 'FoodItemsController@planoptionmealdelete')->name('planoptionmealdelete');

Route::get('foodeditmodal', 'FoodItemsController@foodeditmodal');
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



    Route::get('mealsplanoption', 'FoodItemsController@mealsplanoption')->name('mealsplanoption');

    Route::post('createplanoptionmeal', 'FoodItemsController@createplanoptionmeal')->name('createplanoptionmeal');

    Route::post('/updateplanoptionmeal','FoodItemsController@updateplanoptionmeal')->name('updateplanoptionmeal');

    Route::post('/delete_mealsplanoption','FoodItemsController@delete_mealsplanoption');


    Route::get('planoptioncategories', 'FoodItemsController@planoptioncategories')->name('planoptioncategories');

    Route::post('createplanoptioncategory', 'FoodItemsController@createplanoptioncategory')->name('createplanoptioncategory');

    Route::post('/updateplanoptioncat','FoodItemsController@updateplanoptioncat')->name('updateplanoptioncat');

    Route::post('/delete_planoptioncategory','FoodItemsController@delete_planoptioncategory');


    Route::get('plansoption', 'FoodItemsController@plansoptionlisting')->name('plansoption');
    Route::get('createplanoptions', 'FoodItemsController@createplanoptions')->name('createplanoptions');
    Route::post('storeplanoptions', 'FoodItemsController@storeplanoptions')->name('storeplanoptions');
    Route::get('/planoptions_edit/{id}','FoodItemsController@planoptions_edit');
    Route::put('/planoptions_update/{id}','FoodItemsController@planoptions_update');

    Route::post('/delete_planoptions','FoodItemsController@delete_planoptions');


    Route::get('/planoptions_mealslist/{id}', 'FoodItemsController@planoptions_mealslist');

    Route::get('/addplanoptions_mealfood/{id}', 'FoodItemsController@addplanoptions_mealfood');

    Route::post('storeplanoptions_meal', 'FoodItemsController@storeplanoptions_meal')->name('storeplanoptions_meal');

    Route::post('updateplanoptions_meal', 'FoodItemsController@updateplanoptions_meal')->name('updateplanoptions_meal');

    Route::get('editplanoptions_mealfood/{id}/{meal_type}', 'FoodItemsController@editplanoptions_mealfood')->name('editplanoptions_mealfood');






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


//Make your own meal

    Route::get('momuserorderprint/{mid}', 'CartController@momuserorderprint')->name('momuserorderprint');
    Route::get('showmomupdatedstatus', 'CartController@showmomupdatedstatus');

//Make your own meal


    Route::get('forgot','UserController@forgot');
    Route::post('forgotpassword','UserController@forgotpassword');

    Route::get('planoptorderprint/{uid}/{oid}/{pid}', 'CartController@planoptorderprint')->name('planoptorderprint');

    Route::post('updateaccount', 'CartController@updateaccount');
    //make reservation
    Route::post('reservation', 'HomeController@MakeReservation')->name('reservation');

    Route::get('listplancategories', 'HomeController@listplancategories')->name('listplancategories');
    Route::get('listplansoptionscat', 'HomeController@listplansoptionscat')->name('listplansoptionscat');

    //About us
    Route::get('about', 'HomeController@ShowAbout')->name('about');

    //reservation
    Route::get('reservation', 'HomeController@ShowReservation')->name('reservation');

    Route::post('detailaddToCart', 'CartController@detailaddToCart');

Route::get('planorderprint/{uid}/{oid}/{pid}', 'CartController@planorderprint')->name('planorderprint');

    //contact
    Route::get('contact', 'HomeController@ShowContact')->name('contact');
    Route::post('contact', 'HomeController@ContactMail')->name('contactMail');

    //add bilal
    Route::get('menu', 'HomeController@ShowMenu')->name('menu');
    Route::get('productdetail/{id}', 'HomeController@productdetail')->name('productdetail');

    Route::post('addreview', 'HomeController@addreview');


     Route::get('checkout', 'CartController@checkout')->name('checkout');

    Route::get('addToCart/{product}', 'ProductController@addToCart')->name('addToCart');
    Route::get('cart', 'CartController@cartShow')->name('cart');
    Route::get('delete-cart/{id}', 'CartController@removeCartProduct')->name('cart');
    Route::get('cart/update', 'CartController@update');
    Route::get('account', 'CartController@userDashboard')->name('account');
    Route::get('ordersdetails/{id}', 'CartController@ordersDetails');
    Route::get('categoriespro/{id}', 'HomeController@categoriesPro');
    Route::get('pricefilter/', 'HomeController@priceFilter');
    Route::get('price-asc', 'HomeController@priceAsc');
    Route::get('price-desc', 'HomeController@priceDesc');

    Route::get('clear', 'CartController@clear');
    Route::get('clearmealcard', 'CartController@clearmealcard')->name('clearmealcard');
   Route::get('showupdatedstatus', 'CartController@showupdatedstatus');

   Route::get('showupdatedstatuss', 'CartController@showupdatedstatuss');

Route::get('caloriefilter/', 'HomeController@calorieFilter');
    // new cart

    Route::post('cart-add', 'CartController@addToCart');
    Route::get('countProduct', 'CartController@countProduct');
    Route::post('storecustomer', 'OrderController@storeCustomer');
    Route::get('thank', 'CartController@checkoutFinal');

    Route::post('cartadd', 'CartController@addCart');
    Route::get('meal', 'HomeController@meal')->name('meal');
    Route::get('mealemodal', 'HomeController@mealeModal');

    Route::post('handlemealcart', 'CartController@handlemealcart')->name('handlemealcart');


   Route::post('registeruser','UserController@create');
   Route::post('userlogin','UserController@login');
   Route::get('userlogout','UserController@logout');

    //send contact mail

    Route::get('searchfood', 'HomeController@searchFood');


Route::get('cat_planoptions/{id}', 'HomeController@cat_planoptions')->name('cat_planoptions');
Route::get('planoptionmeals/{id}/{planid}', 'HomeController@planoptionmeals')->name('planoptionmeals');

Route::get('planoptionmeals_detail/{id}/{planid}/{mealtype}', 'HomeController@planoptionmeals_detail')->name('planoptionmeals_detail');

Route::post('orderplanoptions','HomeController@orderplanoptions')->name('orderplanoptions');



    Route::get('cat_plans/{id}', 'HomeController@plans_Ofcategories')->name('cat_plans');
    Route::get('plandetail/{id}/{planid}', 'HomeController@plandetail')->name('plandetail');
    Route::post('orderplan','HomeController@orderplan')->name('orderplan');
    Route::get('makemeal', 'HomeController@makemeal')->name('makemeal');
    Route::post('storemeal', 'HomeController@storemeal')->name('storemeal');



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




