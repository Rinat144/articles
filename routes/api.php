<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'author'], function (){
    Route::get('/all', [AuthorController::class, 'all']); //список авторов
    Route::get('/search/{name}', [AuthorController::class, 'search']); //поиск по имени
    Route::delete('/delete/{id}', [AuthorController::class, 'delete']); //удаление автора по id
    Route::get('/{id}', [AuthorController::class, 'author']); //получение автора
});

Route::group(['prefix' => 'category'], function (){
    Route::get('/all', [CategoryController::class, 'all']); //список категорий
    Route::get('/{id}', [CategoryController::class, 'category']); //получение категории
});

Route::group(['prefix' => 'article'], function (){
    Route::get('/search', [ArticleController::class, 'search']); //поиск статьи по названию/категории/автору
    Route::get('/all', [ArticleController::class, 'all']); //список статей
    Route::get('/{id}', [ArticleController::class, 'article']); //получение статьи
});





