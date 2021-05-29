<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('hello:closure', function () {
    $this->comment('Hello closure command'); // ① 文字列出力
    return 0; // ② 正常終了なら 0 を返す
})->describe('サンプルコマンド（クロージャ）'); // ③ コマンド説明
