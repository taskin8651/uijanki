<?php

use App\Http\Controllers\Admin\CampaignsController;
use App\Http\Controllers\Admin\CsrPartnersController;
use App\Http\Controllers\Admin\EventGalleriesController;

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

    // Website Settings
    Route::get('website-settings', 'WebsiteSettingsController@index')->name('website-settings.index');
    Route::post('website-settings/update', 'WebsiteSettingsController@update')->name('website-settings.update');
    Route::delete('website-settings/remove-logo', 'WebsiteSettingsController@removeLogo')->name('website-settings.removeLogo');
    Route::delete('website-settings/remove-favicon', 'WebsiteSettingsController@removeFavicon')->name('website-settings.removeFavicon');

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


Route::delete('event-galleries/destroy', [EventGalleriesController::class, 'massDestroy'])
    ->name('event-galleries.massDestroy');

Route::delete('event-galleries/{eventGallery}/remove-image/{mediaId}', [EventGalleriesController::class, 'removeImage'])
    ->name('event-galleries.removeImage');

Route::resource('event-galleries', EventGalleriesController::class);
    

Route::delete('csr-partners/destroy', [CsrPartnersController::class, 'massDestroy'])
    ->name('csr-partners.massDestroy');

Route::delete('csr-partners/{csrPartner}/remove-logo', [CsrPartnersController::class, 'removeLogo'])
    ->name('csr-partners.removeLogo');

Route::resource('csr-partners', CsrPartnersController::class);

Route::delete('csr-enquiries/destroy', [CsrEnquiriesController::class, 'massDestroy'])->name('csr-enquiries.massDestroy');
Route::resource('csr-enquiries', CsrEnquiriesController::class)->only(['index', 'show', 'destroy']);

Route::delete('registration-enquiries/destroy', [RegistrationEnquiriesController::class, 'massDestroy'])->name('registration-enquiries.massDestroy');
Route::resource('registration-enquiries', RegistrationEnquiriesController::class)->only(['index', 'show', 'destroy']);

Route::delete('contact-enquiries/destroy', [ContactEnquiriesController::class, 'massDestroy'])->name('contact-enquiries.massDestroy');
Route::resource('contact-enquiries', ContactEnquiriesController::class)->only(['index', 'show', 'destroy']);

Route::delete('volunteer-registrations/destroy', [VolunteerRegistrationsController::class, 'massDestroy'])->name('volunteer-registrations.massDestroy');
Route::resource('volunteer-registrations', VolunteerRegistrationsController::class)->only(['index', 'show', 'destroy']);

Route::delete('message-enquiries/destroy', [MessageEnquiriesController::class, 'massDestroy'])->name('message-enquiries.massDestroy');
Route::resource('message-enquiries', MessageEnquiriesController::class)->only(['index', 'show', 'destroy']);

Route::delete('partner-enquiries/destroy', [PartnerEnquiriesController::class, 'massDestroy'])->name('partner-enquiries.massDestroy');
Route::resource('partner-enquiries', PartnerEnquiriesController::class)->only(['index', 'show', 'destroy']);

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

Route::view('donate', 'frontend.donate')->name('frontend.donate');

Route::view('volunter', 'frontend.volunter')->name('frontend.volunter');

Route::get('initiatives', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('initiatives');

Route::get('/events', [App\Http\Controllers\Frontend\EventController::class, 'index'])->name('frontend.events.index');

Route::get('campaigns', [App\Http\Controllers\Frontend\CampaignController::class, 'index'])->name('frontend.campaigns.index');
Route::get('campaigns/{campaign}', [App\Http\Controllers\Frontend\CampaignController::class, 'show'])->name('frontend.campaigns.show');


Route::get('gallery', [App\Http\Controllers\Frontend\GalleryController::class, 'index'])->name('frontend.gallery.index');

Route::get('gallery/{eventGallery}', [App\Http\Controllers\Frontend\GalleryController::class, 'show'])->name('frontend.gallery.show');

Route::get('csr', [App\Http\Controllers\Frontend\CsrController::class, 'index'])->name('frontend.csr.index');

Route::view('contact', 'frontend.contact')->name('frontend.contact');
