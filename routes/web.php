<?php

use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ApprovalController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::get('email/approval', [ApprovalController::class, 'show'])->name('approval.notice');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'approved']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Clients
    Route::resource('clients', ClientController::class, ['except' => ['store', 'update', 'destroy']]);

    // Pets
    Route::post('pets/media', [PetController::class, 'storeMedia'])->name('pets.storeMedia');
    Route::resource('pets', PetController::class, ['except' => ['store', 'update', 'destroy']]);

    // Settings
    Route::post('settings/media', [SettingController::class, 'storeMedia'])->name('settings.storeMedia');
    Route::resource('settings', SettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Packages
    Route::resource('packages', PackageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Service
    Route::post('services/media', [ServiceController::class, 'storeMedia'])->name('services.storeMedia');
    Route::resource('services', ServiceController::class, ['except' => ['store', 'update', 'destroy']]);

    // Addons
    Route::post('addons/media', [AddonController::class, 'storeMedia'])->name('addons.storeMedia');
    Route::resource('addons', AddonController::class, ['except' => ['store', 'update', 'destroy']]);

    // Sliders
    Route::post('sliders/media', [SliderController::class, 'storeMedia'])->name('sliders.storeMedia');
    Route::resource('sliders', SliderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Categories
    Route::resource('categories', CategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Appointments
    Route::resource('appointments', AppointmentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Contact
    Route::resource('contacts', ContactController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
