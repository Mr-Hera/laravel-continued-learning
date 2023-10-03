<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PayOrderController;
use App\Postcard;
use App\PostcardSendingService;

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

Route::get('pay', [PayOrderController::class, 'store']);
Route::get('channels', [ChannelController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);

// facades tutorial v1
Route::get('postcards', function() {
    $postcardService = new PostcardSendingService('spain', 4, 6);

    $postcardService->hello('Hello from Mr-Hera with love! ❤', 'test@test.com');
});

// facades tutorial v2
Route::get('facades', function() {
    Postcard::hello('Hello from Facades...', 'learningfacades@laravel.com');
});
