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

Route::get('/', function () {
    return redirect()->route('items');
});


Route::get('items', '\App\Http\Controllers\ItemsController@index')->name('items');
Route::any('ask_question/{id}', '\App\Http\Controllers\QuestionController@ask_question')->name('ask_question');
Route::any('itemlist', function (Illuminate\Http\Request $request) {
    return App\Items::dataOperation($request);
})->name('itemlist');


Route::get('clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:clear');

});

