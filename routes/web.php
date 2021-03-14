<?php

use App\Http\Controllers\ChannelController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\InternetServiceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TelephoneServiceController;
use App\Http\Controllers\TelevisionServiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserManagementController;
use App\Models\Package;
use App\Models\PackageChangeRequest;
use Illuminate\Http\Request;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->middleware('admin-route')->group(function () {
    Route::get('/internet-services', [InternetServiceController::class, 'index'])
        ->name('internet-service-list');

    Route::get('/internet-services/create', [InternetServiceController::class, 'create'])
        ->name('internet-service-create-form');

    Route::post('/internet-services/store', [InternetServiceController::class, 'store'])
        ->name('internet-service-save');

    Route::get('/telephone-services', [TelephoneServiceController::class, 'index'])
        ->name('telephone-service-list');

    Route::get('/telephone-services/create', [TelephoneServiceController::class, 'create'])
        ->name('telephone-service-create-form');

    Route::post('/telephone-services/store', [TelephoneServiceController::class, 'store'])
        ->name('telephone-service-save');

    Route::get('/television-services', [TelevisionServiceController::class, 'index'])
        ->name('television-service-list');

    Route::get('/television-services/create', [TelevisionServiceController::class, 'create'])
        ->name('television-service-create-form');

    Route::post('/television-services/store', [TelevisionServiceController::class, 'store'])
        ->name('television-service-save');

    Route::get('/packages', [PackageController::class, 'index'])
        ->name('package-list');

    Route::get('/packages/create', [PackageController::class, 'create'])
        ->name('package-create-form');

    Route::post('/packages/store', [PackageController::class, 'store'])
        ->name('package-save');

    Route::get('/packages/{package}', [PackageController::class, 'show'])
        ->name('package-detail');

    Route::get('/user-management', [UserManagementController::class, 'index'])
        ->name('user-list');

    Route::get('/user-management/package-change-requests', [UserManagementController::class, 'packageChangeRequests'])
        ->name('package-change-requests');


    Route::get('/user-management/create', [UserManagementController::class, 'create'])
        ->name('user-create-form');

    Route::post('/user-management/store', [UserManagementController::class, 'store'])
        ->name('user-save');

    Route::post(
        '/user-management/requests/{package_change_request}/respond',
        function (PackageChangeRequest $package_change_request, Request $request) {
            if ( $package_change_request ) {
                $user = $package_change_request->user;
                $answer = $request->input('answer');
                $package = $package_change_request->package;
                if ($answer === 'accept' && $user && $package  ) {
                    $user->package()->associate($package);
                    $package_change_request->is_active = false;
                    $user->save();
                    $package_change_request->save();
                } else if ($answer === 'reject') {
                    $package_change_request->is_active = false;
                    $package_change_request->save();
                }
            }

            return redirect()->route('admin.package-change-requests');
        }
    )->name('respond-request');

    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoice-list');

    Route::post('/invoices/close-month', [InvoiceController::class, 'store'])->name('invoices-close-month');

});


Route::prefix('subscriber')->name('subscriber.')->middleware('subscriber-route')->group(function () {
    Route::get('/home', function (Request $request) {
        return view('subscriber-home',["user" => auth()->user() ]);
    })->name('home');

    Route::post('/packages/{package}/request-change', function (Package $package, Request $request) {
        $user = Auth::user();
        if ($package) {
            $user_package_change_request = PackageChangeRequest::where('user_id', $user->id)->where('is_active', true)->first();
            if ($user_package_change_request) {
                $user_package_change_request->is_active = false;
                $user_package_change_request->save();
            }
            PackageChangeRequest::create([
                "user_id" => $user->id,
                "package_id" => $package->id,
            ]);
        }
        return redirect()->route('subscriber.package-list');
    })->name('request-package-change');

    Route::get('/packages/{package}', [PackageController::class, 'show'])
        ->name('package-detail');

    Route::get('/packages', [PackageController::class, 'subscriberIndex'])->name('package-list');

    Route::get('/invoices', [InvoiceController::class, 'subscriberInvoices'])->name('invoice-list');

});

Route::get('/channels', [ChannelController::class, 'index'])->name('channel-list');
Route::get('/channels/{channel}', [ChannelController::class, 'show'])->name('channel-detail');
Route::get('/channels/{channel}/programming/{day}', [ChannelController::class, 'programming'])->name('programming-detail');




Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function (Request $request) {
    return view('login');
})->name('login');



Route::get('/admin/home', function (Request $request) {
    return  view('admin-home');
})->name('admin-home')->middleware('admin-route');

Route::get('/login', function (Request $request) {
    return view('login');
})->name('login');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');


Route::post('/login', function (Request $request) {

    $credentials  = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
    ]);

    if (Auth::attempt($credentials)) {
        if (Auth::user()->is_admin) {
            return redirect()->route('admin-home');
        } else {
            return redirect()->route('subscriber.home');
        }

        $request->session()->regenerate();
    }

    return back()->withErrors([
        'email' => 'there is no user with that credentials',
    ]);
})->name('login-api');

Route::get('/register', function (Request $request) {
    return view('register');
})->name('register');


Route::post('/register', function (Request $request) {


    $user_data  = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|confirmed|min:8'
    ]);

    $user = User::create($user_data);
    Auth::login($user);

    return redirect()->route('subscriber.home');
})->name('register-api');
