<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UsersController;

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
Auth::routes();
Route::group(['middleware' => 'auth'],function(){
    
    
    // ホーム
    Route::get('/',[DisplayController::class,'index'])->name('home');
    //    GOOD投稿一覧
    Route::get('/good', [DisplayController::class,'Good'])->name('good.page');
    Route::get('/other', [DisplayController::class,'Other'])->name('other.page');
    Route::get('/bad', [DisplayController::class,'Bad'])->name('bad.page');
    Route::get('/hiroba', [DisplayController::class,'Hiroba'])->name('hiroba.page');
    
// 投稿詳細
    Route::get('/post_detail/{post}',[DisplayController::class,'postDetail'])->name('post_detail');
// 投稿編集
    Route::get('/post_edit/{post}',
    [RegistrationController::class,'postEditForm'])->name('postedit.form');
    Route::post('/post_edit/{post}',[RegistrationController::class,'postEdit'])->name('postedit.form');
// 投稿削除（確認）

Route::get('/delete_check/{post}',[RegistrationController::class,'postDeleteForm'])->name('delet_check');
// 投稿削除（完了）
Route::get('/post_delete/{post}',[RegistrationController::class,'postDelete'])->name('postdelet');

// 新規投稿
    Route::get('/create_post',[RegistrationController::class,'CreatepostForm'])->name('create_post.form');
    Route::post('/create_post',[RegistrationController::class,'Createpost'])->name('create_post.form');
    
// プロフィールページ(自分）へ
Route::get('/profile', [DisplayController::class,'Profile'])->name('profile.page');
// プロフィールページ(他人）へ
    Route::get('/other_profile', [DisplayController::class,'otherProfile'])->name('other_profile.page');

// ブックマーク一覧
});

// 【管理者ページ】

// ユーザー一覧
Route::get('/all_user',[UsersController::class,'allUser']);
