<?php

use App\Jobs\ExampleJob;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/test-job', function () {
    ExampleJob::dispatch(['example' => 'value']);
    return 'ok';
});

Route::get('/test-email', function () {
    Mail::to('leonardolivelopes2@gmail.com')->send(new TestMail());
    return 'ok';
});
