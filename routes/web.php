<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;

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
    
    // 権限管理
    // Route::get('layout',[DisplayController::class,'Layout']);
    
    // ホーム
    Route::get('/',[DisplayController::class,'index'])->name('home');
    //    GOOD投稿一覧
    Route::get('/good', [DisplayController::class,'Good'])->name('good.page');
    Route::get('/other', [DisplayController::class,'Other'])->name('other.page');
    Route::get('/bad', [DisplayController::class,'Bad'])->name('bad.page');
    // 全体の投稿
    Route::get('/hiroba', [DisplayController::class,'Hiroba'])->name('hiroba.page');
    
// 投稿詳細
    Route::get('/post_detail/{post}',[DisplayController::class,'postDetail'])->name('post_detail');
    Route::get('/allpost_detail/{post}',[DisplayController::class,'AllpostDetail'])->name('allpost_detail');
// 新規投稿
        Route::get('/create_post',[RegistrationController::class,'CreatepostForm'])->name('create_post.form');
        Route::post('/create_post',[RegistrationController::class,'Createpost'])->name('create_post.form');
// 投稿編集
    Route::get('/post_edit/{post}',
    [RegistrationController::class,'postEditForm'])->name('postedit.form');
    Route::post('/post_edit/{post}',[RegistrationController::class,'postEdit'])->name('postedit.form');
// 投稿削除（確認）

Route::get('/delete_check/{post}',[RegistrationController::class,'postDeleteForm'])->name('delet_check');
// 投稿削除（完了）
Route::get('/post_delete/{post}',[RegistrationController::class,'postDelete'])->name('postdelet');

    
// プロフィールページ(自分）へ
Route::get('/profile/{user_id}', [profileController::class,'Profile'])->name('profile.page');
// プロフィール編集
Route::get('/edit_profile/{user}', [profileController::class,'editProfileForm'])->name('edit_profile');
Route::post('/edit_profile/{user}', [profileController::class,'editProfile'])->name('edit_profile');
// プロフィールページ(他人）へ
    Route::get('/other_profile/{id}', [DisplayController::class,'otherProfile'])->name('other_profile.page');

// ブックマーク一覧

// 【管理者ページ】

// ユーザー一覧
Route::get('/all_user',[UsersController::class,'allUser']);

});