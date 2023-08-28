<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;


Route::get('/', function () {
    return view('index');
});

Route::post('/post_send',[postController::class,'index']);

Route::get('/sitemap.xml',[postController::class,'show']);
Route::get('/slug/{name}',[postController::class,'viewpost']);