<?php

Route::domain(config("app.internal_domain"))->group(function () {

    // Authentication routes and password reset routes etc ...
    Route::group(['namespace' => '\App\Modules\Internal\app\Http\Controllers\Auth', 'as' => 'internal::', 'middleware' => ['web']],
        function () {
            Route::get('login', 'LoginController@show');
            Route::post('login', 'LoginController@login')->name('login');
            Route::post('logout', 'LoginController@logout')->name('logout');

            // Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
            // Route::post('register', 'RegisterController@register');

            // Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
            // Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
            // Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
            // Route::post('password/reset', 'ResetPasswordController@reset');
        }
    );

});