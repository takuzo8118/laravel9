<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// 未ログイン時にアクセスできるページ
Route::get('/', function () {
    return view('layouts.guest');
})->name('home');

// 投稿一覧のルーティング
Route::get('/posts', function () {
    return view('posts.index');
})->middleware(['auth'])->name('posts');
// ログイン後にダッシュボードへ行くようにBreezeインストール時に定義されているもの
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
// 管理者でログインを行った場合はこちらにいくように設定したい

// プロフィール編集などのルーティング
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// ルーティングが追加されていないので以下の書き方で変更を加えます。
Route::prefix('admin')->name('admin.')->group(function () {
    // admin.dashboardのルーティングが存在しないため追記
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard');
    // こちらで追加して読み込ませる
    require __DIR__.'/admin.php';
});
