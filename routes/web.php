<?php

//use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\IndexController;
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

Route::group(['namespace' => 'Main'], function() {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function() {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');

    // post/id/comment
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function(){
        Route::post('/', 'StoreController')->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function(){
        Route::post('/', 'StoreController')->name('post.like.store');
    });
});

//['auth', 'verified']
Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => 'auth'], function() {
    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function() {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function() {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::get('/{comment}/delete', 'DeleteController')->name('personal.comment.delete');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function() {
        Route::get('/', 'IndexController')->name('personal.liked.index');
    });
});


//   , 'middleware' => ['auth', 'admin']
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function() {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::get('/edit/{post}', 'EditController')->name('admin.post.edit');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::get('/delete/{post}', 'DeleteController')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function() {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::get('/edit/{category}', 'EditController')->name('admin.category.edit');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::get('/delete/{category}', 'DeleteController')->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function() {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::get('/edit/{tag}', 'EditController')->name('admin.tag.edit');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::get('/delete/{tag}', 'DeleteController')->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function() {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::get('/edit/{user}', 'EditController')->name('admin.user.edit');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::get('/delete/{user}', 'DeleteController')->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);
