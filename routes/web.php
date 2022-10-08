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

Route::get('/', function () {
    for ($i = 0; $i < 100; $i++) {
        \App\Jobs\SendWelcomeEmail::dispatch();
    }

    \App\Jobs\ProcessPayment::dispatch()->onQueue('payments');

    return view('welcome');
});
