<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('welcome');
});



Route::group(array('middleware' => 'front','prefix' => (request()->segment(1) == 'ar' || request()->segment(1) == 'en') ? request()->segment(1) : ''), function () {


    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/admin', 'HomeController@dashboard')->middleware(['auth'])->name('dashboard');
    foreach (File::allFiles(__DIR__ . '/Admin') as $route) {
    require_once $route->getPathname();
}
});
