<?php

Route::domain(config("app.internal_domain"))->group(function () {

    Route::group(['namespace' => '\App\Modules\Internal\app\Http\Controllers\Backend', 'as' => 'internal::', 'middleware' => ['web', 'internal-auth:internal']],

        function () {

            Route::get('/', 'DashboardController')->name('dashboard');

            Route::get('profile', 'ProfileController@index')->name('profile.index');
            Route::post('profile', 'ProfileController@update')->name('profile.update');
            Route::post('profile/update-avatar', 'ProfileController@updateAvatar')->name('profile.updateAvatar');
            Route::get('profile/change-avatar', 'ProfileController@showAvatarForm')->name('profile.showAvatarForm');
            Route::post('profile/update-password', 'ProfileController@updatePassword')->name('profile.updatePassword');
            Route::get('profile/change-password', 'ProfileController@showPasswordForm')->name('profile.showPasswordForm');

            Route::resource('role', 'RoleController');

            Route::resource('user', 'UserController');

        });

});
