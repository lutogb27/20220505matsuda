<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
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

Route::get('/', [ContactsController::class, 'index'])->name('index');
Route::post('/index/confirm', [ContactsController::class, 'confirm'])->name('confirm');
Route::post('/index/complete', [ContactsController::class, 'complete'])->name('complete');
Auth::routes();

//管理側
Route::group(['middleware' => ['auth.admin']], function () {
	
	//管理側トップ
	Route::get('/admin', [ContactsController::class, 'show'])->name('admin');;
	//ログアウト実行
	Route::post('/admin/logout', [ContactsController::class, 'logout'])->name('logout');;
    });

//管理側ログイン
// ログインの処理だけを行う、loginメソッド内でお問い合わせ一覧にリダイレクトする
Route::post('/admin/login', [ContactsController::class, 'showadminlogin'])->name('showadminlogin');

// お問い合わせ一覧ページ
Route::get('/admin/login', [ContactsController::class, 'login'])->name('login');
Auth::routes();

Route::post('/admin/{id}/', [ContactsController::class, 'list'])->name('list');
Auth::routes();

Route::post('/admin/delete{id}/', [ContactsController::class, 'delete']);
