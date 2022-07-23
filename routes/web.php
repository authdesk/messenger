<?php

use Illuminate\Support\Facades\Route;

//admin cobtroller define here
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;



//user cobtroller define here
use App\Http\Controllers\Frontend\UserController;



//Site routes
Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::post('send-guest-message', [App\Http\Controllers\Frontend\MessengerController::class, 'send_guest_message'])->name('send-guest-message');





require __DIR__.'/auth.php';

//user profile

Route::middleware('auth')->group(function(){

    //frontend routes
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

    //user profile route
    Route::get('user-profile', [UserController::class, 'user_profile'])->name('user-profile');
    
    //user messenger route
    Route::get('user-messenger', [App\Http\Controllers\Frontend\MessengerController::class, 'user_messenger'])->name('user-messenger');
    Route::get('user-message/{id}', [App\Http\Controllers\Frontend\MessengerController::class,'user_message'])->name('user-message');
    Route::post('user-send-message', [App\Http\Controllers\Frontend\MessengerController::class,'user_send_message'])->name('user-send-message');
    



});



//admin routes

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    
    Route::namespace('Auth')->middleware('guest:web')->group(function(){

        //admin login route
        Route::get('/login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AdminAuthenticatedSessionController::class, 'store'])->name('adminlogin');

    });

    Route::middleware('admin')->group(function(){

        //admin dashboard route
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

        //settings routes
        Route::resource('settings', SettingController::class);
        Route::get('active-settings/{id}', [App\Http\Controllers\Admin\SettingController::class,'active_settings']);
        Route::get('inactive-settings/{id}', [App\Http\Controllers\Admin\SettingController::class,'inactive_settings']);
        
        //super admin routes
        Route::resource('super-admin', SuperAdminController::class);
        Route::get('make-super-admin/{id}', [App\Http\Controllers\Admin\SuperAdminController::class,'make_super_admin']);
        Route::get('make-admin/{id}', [App\Http\Controllers\Admin\SuperAdminController::class,'make_admin']);


        //messanger routes
        Route::get('messenger', [App\Http\Controllers\Admin\MessengerController::class,'messenger'])->name('messenger');
        Route::get('message/{id}', [App\Http\Controllers\Admin\MessengerController::class,'message'])->name('message');
        Route::post('send-message', [App\Http\Controllers\Admin\MessengerController::class,'send_message'])->name('send-message');

         //messanger routes
         Route::resource('guest-message', GuestMessageController::class);
       
    });

    //admin logout route
    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});