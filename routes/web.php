<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;

/** Главная страница (Список статей) */
Route::get('/', [ArticleController::class, 'index'])
    ->name('index');

/** Страница "О нас" */
Route::get('/about', [AboutController::class, 'index'])
    ->name('about');

/** Страница "Контакты" */
Route::get('/contacts', [ContactController::class, 'create'])
    ->name('contacts');

/** Создать обращение */
Route::post('/contacts', [ContactController::class, 'store'])
    ->name('store-contact');


/** Работа со статьями */
Route::prefix('/articles')->controller(ArticleController::class)->group(function () {

    /** Страница добавления новой статьи */
    Route::get('/create', 'create')
        ->name('create-article');

    /** Создать статью */
    Route::post('/', 'store')
        ->name('store-article');

    /** Детальная страница статьи */
    Route::get('/{article}', 'show')
        ->middleware('published')
        ->name('show-article');

    /** Изменить статью */
    Route::patch('/{article}', 'update')
        ->middleware('published')
        ->name('update-article');

    /** Удалить статью */
    Route::delete('/{article}', 'show')
        ->middleware('published')
        ->name('delete-article');

    /** Страница обновления статьи */
    Route::get('/{article}/edit', 'edit')
        ->middleware('published')
        ->name('edit-article');
});


/** Админ-панель */
Route::prefix('/admin')->group(function () {

    /** Список обращений */
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin-panel');

    /** Список обращений */
    Route::get('/feedback', [AdminFeedbackController::class, 'index'])
        ->name('admin-panel-feedback');
});
