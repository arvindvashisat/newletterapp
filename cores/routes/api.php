<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'v1'
], function ($router) {
   
    Route::get('/listpost', 'Api\v1\PostController@listpost')->name('listpost');
    Route::post('/subscribe', 'Api\v1\PostController@subscribe')->name('subscribe');
    Route::post('/post', 'Api\v1\PostController@post')->name('post');
});
