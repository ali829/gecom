<?php

Route::group(['middleware' => ['front']], function () {
    //Route::get('/', 'FrontController@index')->name('home');
    Route::get('/', function () {
        return redirect('/admin/');
    })->name('home');
    Route::get('/categorie/{id}', 'FrontController@show_categorie')->name('front.categorie-products');
    Route::get('/categories', 'FrontController@categories')->name('front.categories');
    Route::get('/product/{id}', 'FrontController@show_product')->name('front.products');
    Route::get('/validation/{id}', 'FrontController@validation')->name('front.validation');
    Route::get('/cart', 'FrontController@cart')->name('front.cart');
    Route::get('/connexion', 'FrontController@cnx')->name('front.cnx');
    Route::get('/contactus', 'FrontController@contactus')->name('front.contactus');
    Route::get('/order/step1', 'FrontController@order_1')->name('front.order-step1');
    Route::get('/order/step2/{id}', 'FrontController@order_2')->name('front.order-step2');
    Route::get('/order/step3/{id}', 'FrontController@order_3')->name('front.order-step3');
    Route::post('/order/step2/{id}', 'FrontController@order_2_shippingInfo')->name('front.order-step2-shippingInfo');
    Route::post('/order/step3/{id}', 'FrontController@order_3_paymentInfo')->name('front.order_3_paymentInfo');
    Route::post('/addtocart/{id}', 'FrontController@addToCart')->name('cart.addtocart');
    Route::post('/removeitem/{id}', 'FrontController@removeItem')->name('cart.remove');
    Route::post('/cart/convert', 'FrontController@convert_cart')->name('cart.convert');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::get('/product/create', function () {
        return view('dashboard.products.create');
    });
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    return redirect('/admin');
})->name('logout');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login');

Route::get('/login', 'Auth\ClientLoginController@showLoginForm')->name('client.login');
Route::post('/login', 'Auth\ClientLoginController@login');

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth:admin']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');

    Route::get('admin', function () {
        return view('admin.home');
    });
    Route::get('admin/product/liste', function () {
        return view('admin.product.liste');
    });
    Route::get('admin/product/create', function () {
        return view('admin.product.create');
    });
    Route::get('admin/category/liste', function () {
        return view('admin.category.liste');
    });
    Route::get('admin/category/create', function () {
        return view('admin.category.create');
    });
    Route::get('admin/entrepot/liste', function () {
        return view('admin.entrepot.liste');
    });
    Route::get('admin/entrepot/create', function () {
        return view('admin.entrepot.create');
    });
    Route::get('admin/entrepot/transfert', function () {
        return view('admin.entrepot.transfert');
    });
    Route::get('admin/shipping/liste', function () {
        return view('admin.shipping.liste');
    });
    Route::get('admin/shipping/create', function () {
        return view('admin.shipping.create');
    });


    Route::get('order/new', 'OrderController@new')->name('order.new');
    Route::post('product/getProducts/', 'ProductController@getProducts')->name('product.getProducts');
    Route::post('product/getClients/', 'ClientController@getClients')->name('client.getClients');

    Route::post('shipment_ranges/update_destination_price', 'ShipmentRangeController@update_destination_price');

    Route::get('order/createnew/{client?}', 'OrderController@createSpecified')->name('order.createSpecified');

    // Shipper/destionation/entrepots Pivot routes
    Route::get('shipper/{id}/pricing', 'ShipperController@show_pricing')->name('shipper.pricing');

    Route::get('product/{id}/shippers', 'pivotController@showshippers')->name('product.showShippers');
    Route::post('product/shipper/assign/{id}', 'pivotController@assignShipper')->name('product.assignShipper');
    Route::get('product/shipper/{id}/assign', 'pivotController@addshipper')->name('product.addShipper');
    Route::delete('product/{pid}/delete/{sid}', 'pivotController@deleteShipper')->name('product.destroyShipper');

    Route::get('product/{id}/entrepots', 'pivotController@showentrepots')->name('product.showEntrepots');
    Route::get('product/entrepot/{id}/assign', 'pivotController@addentrepot')->name('product.addEntrepot');
    Route::post('product/entrepot/assign/{id}', 'pivotController@assignentrepot')->name('product.assignEntrepot');
    Route::delete('product/entrepot/{product_id}/delete/{p_id}', 'pivotController@dettachEntrepot')->name('product.destroyEntrepot');
    Route::get('entrepot/{id}/products', 'pivotController@showproducts')->name('entrepot.showProducts');
    Route::post('entrepot/product/transfer', 'pivotController@transfer')->name('entrepot.transfer');
    Route::delete('entrepot/product/{e_id}/dettach/{p_id}', 'pivotController@dettachpro')->name('entrepot.dettach');
    Route::get('product/getprix/{id}', 'ProductController@getProductPrix')->name('product.getProductPrix');
    Route::post('order/neworder', 'OrderController@createOrder')->name('product.newOrder');

    Route::get('categorie/list_sub/{id}', 'CategorieController@list_sub')->name('list_sub_categorie');
    Route::get('/categorie/create_sub/{id}', 'CategorieController@create_sub')->name('create_sub_categorie');

    // Image upload routes
    Route::post('images/upload_ajax', 'ImageController@upload_ajax')->name('image.upload');

    //readnotification
    Route::get('notification/read/ent/{nid}/{eid}', 'NotificationController@redirectTo_ent')->name('notification.redirect_ent');
    Route::get('notification/read/ord/{n_id}/{id}', 'NotificationController@redirectTo_ord')->name('notification.redirect_ord');
    Route::get('notification/readall', 'NotificationController@readall')->name('notification.readall');
    Route::get('notification/viewall', 'NotificationController@viewall')->name('notification.viewall');

    //settings
    Route::get('settings/create', 'SettingController@create')->name('setting.showSetting');
    Route::put('settings/update/{setting}', 'SettingController@update')->name('setting.update');

    // Ressorce Controllers
    Route::resource('categorie', 'CategorieController', ['except' => ['show']]);
    Route::resource('destination', 'DestinationController', ['except' => ['show']]);
    Route::resource('entrepot', 'EntrepotController', ['except' => ['show']]);
    Route::resource('product', 'ProductController', ['except' => ['show']]);
    Route::resource('shipper', 'ShipperController', ['except' => ['show']]);
    Route::resource('client', 'ClientController', ['except' => ['show']]);
    Route::resource('order', 'OrderController', ['except' => ['create']]);
    Route::resource('shipment_ranges', 'ShipmentRangeController', ['only' => ['store', 'destroy']]);
    Route::resource('bundle', 'BundleController', ['exept' => ['show']]);
    Route::resource('promotion', 'PromotionController', ['exept' => ['show']]);
    Route::resource('supplier', 'SupplierController', ['exept' => ['show']]);
    Route::resource('transfert', 'TransfertController');
});

Route::group(['middleware' => ['auth:client']], function () {
    Route::get('wish_list', function () {
        return 'wish list for client';
    });
});
