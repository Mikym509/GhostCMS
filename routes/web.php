<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Models\User;

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
    return view('auth.Login');
});
Route::get('/auth/register', [MainController::class, 'register',])->name('auth.Register');

Route::post('auth/save', [MainController::class, 'save'])->name('auth.Save');
Route::post('auth/check', [MainController::class, 'check'])->name('auth.Check');
Route::get('auth/logout', [MainController::class, 'logout'])->name('auth.Logout');
Route::get('/auth/login', [MainController::class, 'login'])->name('auth.Login');

Route::get('/YourSite', function () {
    return view('viewSite');
});

//middleware
Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('auth.Dashboard');
    Route::get('/dashboard', [MainController::class, 'getUtenti']);
    Route::get('/dashboard/{username}', [MainController::class, 'editProfile']);
    Route::post('/dashboard/{username}/update', [MainController::class, 'update'])->name('userUpdate');
    Route::get('/site', function () {
        return view('site');
    });
    Route::get('/blog/create', [BlogController::class, 'create']);
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.Store');
    Route::get('/posts', [BlogController::class, 'postsView'])->name('blog.Post');
    Route::get('/drafts', [BlogController::class, 'draftsView'])->name('blog.Drafts');
    Route::get('/scheduled', [BlogController::class, 'scheduledView'])->name('blog.Scheduled');
    Route::get('/published', [BlogController::class, 'publishedView'])->name('blog.Published');
    Route::get('/tags', [BlogController::class, 'tagView'])->name('blog.Tag');
    Route::get('/tags/{tag}', [BlogController::class, 'showTags'])->name('blog.ShowTags');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.Show');
    Route::get('/blog/{slug}/edit', [BlogController::class, 'edit'])->name('blog.Edit');
    Route::post('/blog/{slug}/update', [BlogController::class, 'update'])->name('blog.Update');
    Route::post('/blog/{slug}/delete', [BlogController::class, 'delete'])->name('blog.Delete');
    Route::get('/gallery', [GalleryController::class, 'gallery']);
    Route::get('/gallery/add', [GalleryController::class, 'addImageviews']);
    Route::post('/gallery/{title}/delete', [GalleryController::class, 'delete']);
    Route::post('/gallery/add/upload', [GalleryController::class, 'upload'])->name('gallery.Upload');
    Route::get('/posts/category', [BlogController::class, 'categoryView'])->name('blog.Category');
    Route::post('/posts/category/add', [BlogController::class, 'addCategory'])->name('blog.AddCategory');
    Route::get('/posts/category/{name}', [BlogController::class, 'showCategory'])->name('blog.showCategory');
});