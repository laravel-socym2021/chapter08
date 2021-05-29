<?php

use App\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('welcome');
});

# 引数無し
Route::get('/no_args', function () {
    Artisan::call('no-args-command');
});

# 引数有り
Route::get('/with_args', function () {
    Artisan::call('with-args-command', [
        'name' => 'Johann',
        '--switch' => true,
    ]);

    // 下記のようにコマンド名の後に引数を文字列で指定しても良い
    // Artisan::call('with-args-command Johann --switch');
});

Route::get('/no_args_di', function (Kernel $artisan) {
    $artisan->call('no-args-command');
});
