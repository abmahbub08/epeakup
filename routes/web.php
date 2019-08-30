<?php

Route::get('optimize', function(){
	Artisan::call('optimize:clear');
	return 'yes';
});

//User Subscriptions
Route::post('/subscribe', function(){
    $email = request('email');
    Newsletter::subscribe($email);
    return redirect()->back()->with('success', 'You are Subscribed.');
})->name('subscribe');

// user panel
Auth::routes(['verify' => true]);
Route::get('/', 'User\UserController@index')->name('index');
Route::get('/about-us', 'User\UserController@about')->name('about');
Route::get('/howitwork', 'User\UserController@howitwork')->name('howitwork');
Route::get('/faq', 'User\UserController@faq')->name('faq');
Route::get('/tandc', 'User\UserController@tandc')->name('tandc');
Route::get('/ppolicy', 'User\UserController@ppolicy')->name('ppolicy');

Route::get('/help', 'User\UserController@help')->name('help');
Route::post('/issue/send', 'User\IssueController@store')->name('issue.send');



// user panel
Route::group(['middleware' => 'verified'], function () {
    //user actions
    Route::resource('user', 'User\UsersController')->only(['edit','update']);


    Route::get('getservice/{id}', 'User\UserController@getservice');
    Route::get('getmethods/{id}', 'User\UserController@getmethods');

    Route::get('/send/money', 'User\UserController@getStartPage')->name('getStart');
    Route::get('/recipient-add', 'User\UserController@AddNewRecipient')->name('recipientsAdd');
    Route::get('/payment-method', 'User\UserController@paymentMethodPage')->name('payMethod');
//    Route::get('/internet-banking', 'User\UserController@paymentPoli')->name('poli');
    Route::get('/debit-credit-card', 'User\UserController@paymentDebitOrCreditCard')->name('cdCard');
    Route::get('/transactions', 'User\UserController@myTransections')->name('transactions');
    Route::get('/detail', 'User\UserController@myDetailsPage')->name('details');
    Route::get('/recipients', 'User\UserController@myRecipientDetails')->name('recipients');
    // Route::get('/settings', 'User\UserController@mySettingsPage')->name('settings');

    //recipient controller
    Route::resource('recipient', 'RecipientController');

    // Transaction  controller
    Route::post('/transaction/send', 'User\TansactionController@sendInfo')->name('send');
    Route::post('/transaction/check-methods', 'User\TansactionController@checkPaymentMethod')->name('checkPaymentMethod');
    Route::post('/transaction/poli-bank-info', 'User\TansactionController@poliBankinfo')->name('checkOutPoli');
    Route::post('/transaction/card-check-out', 'User\TansactionController@cardCheckOut')->name('cardCheckOut');
    Route::get('/transaction/checkout-poli', 'User\TansactionController@checkOutWithPoli')->name('checkOutWithPoli');
    Route::get('/poli/success', 'User\TansactionController@poliSuccess')->name('poli.success');
    Route::get('/execute-payment', 'User\TansactionController@paypalExecute')->name('paypal');
    Route::get('/create-payment', 'User\TansactionController@paypalCreate')->name('paypal.create');

});


//Admin panel routes
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

    //user info show in admin panel
    Route::get('/users', 'Admin\UsersShowController@index')->name('usersDetails.index');

    //user delete from admin panel
    Route::delete('/users/delete/{id}', 'Admin\UsersShowController@destroy')->name('usersDetails.destroy');

    //issue show in admin panel
    Route::get('/issues', 'User\IssueController@index')->name('issue.index');

    //country manage
    Route::resource('countries','Admin\CountriesController');

    //Service manage
    Route::resource('services','Admin\ServicesController');

    //Method Controller
    Route::resource('methods','Admin\MethodsController');

    //Currency Controller
    Route::resource('currencies','Admin\CurrenciesController');

    //Admin controller
    Route::get('/addbalance', 'AdminController@addBalance')->name('addbalance');
    Route::get('/balance', 'AdminController@manageBalance')->name('balance');
    Route::get('/message', 'AdminController@mailBox')->name('message');
    Route::get('/compose', 'AdminController@compose')->name('compose');

    //order controller
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('/send/message/{id}', 'OrderController@messageSend')->name('message.send');
    Route::get('/complete/process/{id}', 'OrderController@updateStatus')->name('update.status');
    Route::get('/orders/archive', 'OrderController@archiveOrders')->name('orders.archive');

    //Slider Controller
    Route::resource('slider', 'Admin\cms\SliderController')->except(['show']);

    //Payment Method Discount Controller
    Route::resource('discounts', 'Admin\DiscountController')->except(['show']);

    //Agent Money request
    Route::get('agent/request', 'Admin\ApproveRequestController@index')->name('agent.money.request');
    Route::get('agent/request/archive', 'Admin\ApproveRequestController@archive')->name('agent.request.archive');
    Route::get('agent/request/{id}', 'Admin\ApproveRequestController@update')->name('agent.money.update');
    Route::delete('agent/request/{id}', 'Admin\ApproveRequestController@destroy')->name('agent.money.destroy');

    //Agent Balance Transfer
    Route::get('agent/orders', 'Admin\AgentOrdersController@index')->name('agent.orders');
    Route::get('agent/orders/archive', 'Admin\AgentOrdersController@archive')->name('agent.archive');
    Route::PUT('agent/orders/{id}', 'Admin\AgentOrdersController@update')->name('agent.orders.done');


    //Agent Approved
    Route::get('agents/list', 'Admin\ApprovedAgentController@index')->name('agents.list');
    Route::put('agents/approved/{id}', 'Admin\ApprovedAgentController@update')->name('agents.approved');
    Route::delete('agents/delete/{id}', 'Admin\ApprovedAgentController@destroy')->name('agents.destroy');
});


