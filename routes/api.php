<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}/show', [PostController::class, 'show']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::patch('/posts/{post}/update', [PostController::class, 'update']);
Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy']);

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('roles', RoleController::class);
Route::resource('comments', CommentController::class);
Route::resource('images', ImageController::class);
Route::resource('messages', MessageController::class);
Route::resource('chats', ChatController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('users', UserController::class);
