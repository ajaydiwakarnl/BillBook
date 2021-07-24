<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/do-login', [\App\Http\Controllers\LoginController::class, 'doLogin'])->name('doLogin');
Route::get('/do-logout', [\App\Http\Controllers\LoginController::class, 'Logout'])->name('Logout');

Route::middleware('auth')->group(function () {
	Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

	//Parties Related Route

	Route::name('parties.')->prefix('parties')->group( function () {
		Route::get('view', [App\Http\Controllers\PartiesController::class, 'index'])->name('index');
		Route::get('add', [App\Http\Controllers\PartiesController::class, 'add'])->name('add');	
		Route::post('save', [App\Http\Controllers\PartiesController::class, 'save'])->name('save');	
		Route::get('edit/{id}', [App\Http\Controllers\PartiesController::class, 'edit'])->name('edit');	
		Route::post('saveEdit', [App\Http\Controllers\PartiesController::class, 'saveEdit'])->name('saveEdit');	
		Route::get('delete/{id}', [App\Http\Controllers\PartiesController::class, 'delete'])->name('delete');

		Route::get('search', [App\Http\Controllers\PartiesController::class, 'searchParties'])->name('searchParties');
	});

	//Accounts Related Route

	Route::name('accounts.')->prefix('accounts')->group( function () {
		Route::get('view', [App\Http\Controllers\AccountController::class,'index' ])->name('index');
	});

});