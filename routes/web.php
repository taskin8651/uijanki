<?php

use App\Http\Controllers\Admin\CampaignsController;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

     // About Page
    Route::get('about-page', 'AboutPageController@index')->name('about-page.index');
    Route::post('about-page/update', 'AboutPageController@update')->name('about-page.update');
    Route::delete('about-page/remove-image', 'AboutPageController@removeImage')->name('about-page.removeImage');

    // Founder Leaders
Route::delete('founder-leaders/destroy', 'FounderLeadersController@massDestroy')->name('founder-leaders.massDestroy');
Route::delete('founder-leaders/{founderLeader}/remove-image', 'FounderLeadersController@removeImage')->name('founder-leaders.removeImage');
Route::resource('founder-leaders', 'FounderLeadersController');

Route::delete('website-services/destroy', 'WebsiteServicesController@massDestroy')->name('website-services.massDestroy');
Route::delete('website-services/{websiteService}/remove-image', 'WebsiteServicesController@removeImage')->name('website-services.removeImage');
Route::resource('website-services', 'WebsiteServicesController');

Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
Route::delete('events/{event}/remove-image', 'EventsController@removeImage')->name('events.removeImage');

Route::resource('events', 'EventsController')->parameters([
    'events' => 'event',
]);

 Route::delete('campaigns/destroy', [CampaignsController::class, 'massDestroy'])
    ->name('campaigns.massDestroy');

Route::delete('campaigns/{campaign}/remove-image', [CampaignsController::class, 'removeImage'])
    ->name('campaigns.removeImage');

Route::resource('campaigns', CampaignsController::class);

    
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


// frontend routes
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('frontend.about');

Route::get('initiatives', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('initiatives');

Route::get('/events', [App\Http\Controllers\Frontend\EventController::class, 'index'])->name('frontend.events.index');

Route::get('campaigns', [App\Http\Controllers\Frontend\CampaignController::class, 'index'])->name('frontend.campaigns.index');
Route::get('campaigns/{campaign}', [App\Http\Controllers\Frontend\CampaignController::class, 'show'])->name('frontend.campaigns.show');
