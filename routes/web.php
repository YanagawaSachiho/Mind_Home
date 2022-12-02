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
    Route::get('/',[DisplayController::class,'index'])->name('/');
    //    GOOD投稿一覧
    Route::get('/good', [DisplayController::class,'Good'])->name('good.page');
    Route::get('/other', [DisplayController::class,'Other'])->name('other.page');
    Route::get('/bad', [DisplayController::class,'Bad'])->name('bad.page');
    // 全体の投稿
    Route::get('/hiroba', [DisplayController::class,'Hiroba'])->name('hiroba.page');
    
// 投稿詳細
    Route::get('/post_detail/{post}',[DisplayController::class,'postDetail'])->name('post_detail');
    Route::get('/otherpost_detail/{post}',[DisplayController::class,'OtherpostDetail'])->name('otherpost_detail');

      // ajax
    //   Route::get('/', 'UsersController::class,Ajax')->name('post_detail');

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
    Route::get('/other_profile/{post}', [profileController::class,'otherProfile'])->name('other_profile.page');
    
    // ブックマーク一覧
    Route::get('/bookmark', [UsersController::class,'bookmark'])->name('bookmark.page');
    // bookmark追加
    Route::get('ajaxmark', [UsersController::class,'ajaxMark'])->name('bookmarkadd.page');
    Route::post('ajaxmark', [UsersController::class,'ajaxMark'])->name('bookmarkadd.page');
    // bookmark削除（一覧からの削除ボタン用）
    Route::get('/bookmarkdelete/{post}', [UsersController::class,'bookmarkDelete'])->name('bookmarkdelete.page');

  

// 【管理者ページ】
// ユーザー一覧
Route::get('/all_user',[UsersController::class,'allUser']);
//ユーザー削除（確認）ボタン
Route::get('/delete_user/{user}',[UsersController::class,'userDeleteForm'])->name('deleteuser.form');
//ユーザー削除（確認）ボタン
Route::get('/delete_user_end/{user}',[UsersController::class,'userDelete'])->name('deleteuser');

// 権限付与
Route::post('/role/{user}',[UsersController::class,'userRole'])->name('role');
// 【検索】
// ・Home検索
    // 検索機能フォームへ
    Route::get('/search_form',[RegistrationController::class,'MySearchForm'])->name('search_form');
    // 検索結果
    Route::get('/search',[RegistrationController::class,'Search'])->name('search');

//・ Hiroba検索
    // 検索機能フォームへ
    Route::get('/allsearch_form',[RegistrationController::class,'AllSearchForm'])->name('allsearch_form');

    Route::get('/allsearch',[RegistrationController::class,'AllSearch'])->name('allsearch');
});


// パスワードリセット

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
