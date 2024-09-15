<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user/index', [App\Http\Controllers\HomeController::class, 'userindex'])->name('user.index');

Route::get('/servicehistory', [App\Http\Controllers\HomeController::class, 'userservicehistory'])->name('user.servicehistory');

Route::get('admin/home',[App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin.home')->middleware('is_admin');

Route::get('admin/index',[App\Http\Controllers\HomeController::class, 'adminindex'])->name('admin.index')->middleware('is_admin');

Route::get('admin/create',[App\Http\Controllers\HomeController::class, 'admincreate'])->name('admin.create')->middleware('is_admin');

Route::get('admin/receipt',[App\Http\Controllers\HomeController::class, 'adminreceipt'])->name('admin.receipt')->middleware('is_admin');

Route::get('admin/customer',[App\Http\Controllers\HomeController::class, 'admincustomer'])->name('admin.customer')->middleware('is_admin');

Route::get('admin/reportsandanalytics',[App\Http\Controllers\HomeController::class, 'adminreportsandanalytics'])->name('admin.reportsandanalytics')->middleware('is_admin');

Route::post('admin/create', [App\Http\Controllers\HomeController::class, 'storeLaundryService'])->name('storeLaundryService')->middleware('is_admin');

Route::get('/admin/customercreate',[App\Http\Controllers\HomeController::class,'admincustomercreate'])->name('admin.customercreate')->middleware('is_admin');

Route::get('admin/edit/{id}', [App\Http\Controllers\HomeController::class, 'adminedit'])->name('admin.edit')->middleware('is_admin');

Route::post('admin/update/{id}', [App\Http\Controllers\HomeController::class, 'adminupdate'])->name('admin.update')->middleware('is_admin');

Route::get('admin/receipt/{id}', [App\Http\Controllers\HomeController::class, 'showReceipt'])->name('admin.showReceipt')->middleware('is_admin');

Route::get('admin/receipt/{id}/pdf', [App\Http\Controllers\HomeController::class, 'downloadReceiptPDF'])->name('admin.downloadReceiptPDF')->middleware('is_admin');

Route::get('admin/receipt/{id}/generate-pdf', [App\Http\Controllers\HomeController::class, 'generateReceiptPDF'])->name('admin.generateReceiptPDF')->middleware('is_admin');

Route::get('admin/reportsandanalytics', [App\Http\Controllers\HomeController::class, 'getReportsAndAnalytics'])->name('admin.reportsandanalytics')->middleware('is_admin');

Route::get('admin/service-details', [App\Http\Controllers\HomeController::class, 'getServiceDetails'])->name('admin.service-details')->middleware('is_admin');

Route::post('admin/archive/{id}', [HomeController::class, 'archiveService'])->name('admin.archive')->middleware('is_admin');

Route::get('user/services', [App\Http\Controllers\HomeController::class, 'userServices'])->name('user.services');


