<?php

Route::group(['namespace' => 'Agent'], function() {
    Route::get('/', 'HomeController@index')->name('agent.dashboard');
    Route::get('/overview', 'HomeController@overview')->name('agent.overview');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('agent.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('agent.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('agent.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('agent.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('agent.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('agent.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('agent.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('agent.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('agent.verification.verify');

    //send money new system by jony
    Route::get('send-money','SendMoneyController@sendMoneyStep')->name('sendMoneyStep');
    Route::get('send-money-preview','SendMoneyController@sendMoneyPreview')->name('sendMoneyPreview');
    Route::post('send-money','SendMoneyController@sendMoney')->name('sendMoney');
    Route::post('pay-now','SendMoneyController@PayNow')->name('PayNow');
    Route::get('pay-back','SendMoneyController@PayBack')->name('PayBack');
    Route::get('search-user','SendMoneyController@searchUser')->name('searchUser');
    Route::get('search-receiver','SendMoneyController@searchReceiver')->name('searchReceiver');
    Route::get('search-client-transaction','SendMoneyController@searchClient')->name('searchClient');
    Route::any('contact-us','SendMoneyController@contactUs')->name('contactUs');
    // send money new system end


    //Profile Show
    Route::get('profile', 'ProfileController@showProfile')->name('agent.showProfile');
    Route::get('profile/edit', 'ProfileController@edit')->name('agent.profile.edit');
    Route::post('profile/update', 'ProfileController@update')->name('agent.profile.update');
    Route::get('Change-password', 'ProfileController@showResetForm')->name('agent.change.password');
    Route::post('Change-password', 'ProfileController@changePassword');

    //Agent Clients controller
    Route::resource('clients', 'ClientsController')->except('show');

    //Agent Receivers controller
    Route::resource('receivers', 'ReceiversController')->except('show');

    //Agent Money Request
    Route::get('money/request', 'MoneyRequestController@create')->name('agent.money-request');
    Route::post('money/request', 'MoneyRequestController@store');

    //Agent balance transfer to recipient
    Route::get('get-receivers/{id}', 'TransactionsController@clientReceiver')->name('agent.get-receivers');
    Route::get('transactions', 'TransactionsController@index')->name('agent.transactions');
    Route::get('transactions/balance', 'TransactionsController@create')->name('agent.transfer.balance');
    Route::post('transactions/balance', 'TransactionsController@store');

});