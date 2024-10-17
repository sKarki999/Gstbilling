<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GstBillController;
use App\Http\Controllers\VendorInvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Party routes
Route::get('/index', [AppController::class, 'index']);
Route::get('/add-party', [PartyController::class, 'addParty'])->name('add-party');
Route::post('/save-party', [PartyController::class, 'saveParty'])->name('save-party');
Route::get('/manage-party', [PartyController::class, 'manageParty'])->name('manage-party');
Route::get('/edit-party/{id}', [PartyController::class, 'editParty'])->name('edit-party');
Route::post('/update-party/{id}', [PartyController::class, 'updateParty'])->name('update-party');
// Route::get('/delete-party/{id}', [PartyController::class, 'deleteParty'])->name('delete-party');
Route::delete('/delete-party/{party}', [PartyController::class, 'deleteParty'])->name('delete-party');


// GST bill routes
Route::get('/create-gst-bill', [GstBillController::class, 'createGstBill'])->name('create-gst-bill');
Route::post('/save-gst-bill', [GstBillController::class, 'saveGstBill'])->name('save-gst-bill');
Route::get('/manage-gst-bill', [GstBillController::class, 'manageGstBill'])->name('manage-gst-bill');
Route::get('/print-gst-bill/{id}', [GstBillController::class, 'printGstBill'])->name('print-gst-bill');

//soft delete
Route::get('/delete/{table}/{id}', [AppController::class, 'delete'])->name('delete');

//Resource Controller
Route::resource('vendor-invoice', VendorInvoiceController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
