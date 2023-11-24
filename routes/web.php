<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
//認証されていないとできないところ、auth/login.bladeにリダイレクトされる
Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/articles/create',[ArticleController::class, 'create'])->name('articles.create');
    //POSTリクエストはURL（/articles）に基づいてルーティングされる
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit',[ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/articles/{article}',[ArticleController::class,'update'])->name('articles.update');
    //show.bladeで特定の記事に対してDELETEリクエスト(postはもう使われている)
    Route::delete('/articles/{article}',[ArticleController::class,'delete'])->name('article.delete');
});
Route::get('/users',[UserController::class,'ShowUsers'])->name('users.show');
Route::get('/login',[HomeController::class, 'login'])->name('login');
Route::get('/register',[HomeController::class, 'register'])->name('register');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
//{articles}は変数(IDなど)
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
