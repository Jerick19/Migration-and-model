<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\GreetController;

use App\Http\Middleware\CheckParam;

// default laravel route
Route::get('/', function () {
    return view('welcome');
});

// just returns a message
Route::get('/hello', function () {
    return 'hi';
});

// calls the greetMethod of the GreetController class
Route::get(
    '/greet', 
    [GreetController::class, 'greetMethod']
);

// gets all posts with their respective comments
Route::get('posts', function(){
    $res = Post::with('comments')->get();
    // $res = Post::all();
    dd($res->toArray());
});

// middleware test
Route::prefix('test')
    ->middleware(CheckParam::class)
    ->group(function () {
    Route::get('/', function () {
        return "This is the /test route.";
    });

    Route::get('{value}', function ($value) {
        return "Accepted: " . $value;
    });
});
