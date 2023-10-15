<?php

use App\Postcard;
use Illuminate\Support\Str;
use App\PostcardSendingService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PayOrderController;
use Illuminate\Support\Facades\Response;

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

Route::get('macros', function() {
    dd(Str::partNumber('32165487545'));
    // dd(Str::prefix('321654987', 'ABCD-'));
    return Response::errorJson('A super huge error occurred!');
});
