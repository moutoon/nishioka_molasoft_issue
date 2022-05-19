<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/member_list/{area?}', [MemberController::class, 'showMemberList']);
Route::post('/search_members', [MemberController::class, 'searchMembers']);
Route::get('/member_detail/{member_id}', [MemberController::class, 'outputMemberInformation']);
Route::get('/team_list', [TeamController::class, 'showTeamList']);
Route::get('/genre_teams/{genre?}', [TeamController::class, 'genreTeams']);
Route::post('/search_teams', [TeamController::class, 'searchTeams']);
Route::get('/teamMember_list', [TeamController::class, 'getTeamMemberInformation']);

// 自作課題（西岡）
    // 記事関連
    route::get('/article', [ArticleController::class, 'showArticle']);                   # 一覧取得
    route::get('/article/{id}', [ArticleController::class, 'getArticleDetail']);         # 詳細取得
    route::post('/create_article', [ArticleController::class, 'createArticle']);         # 新規登録機能
    route::post('/edit_article/{id}', [ArticleController::class, 'editArticle']);        # 編集機能
    route::get('/delete_article/{id}', [ArticleController::class, 'deleteArticle']);     # 削除機能
    route::get('/article_list/{genre?}', [ArticleController::class, 'getArticleGenre']); # ジャンル検索

    //  ユーザー関連
    route::get('/user', [UserController::class, 'showUser']);            # 一覧取得
    route::get('/sort_user', [UserController::class, 'sortUserByTime']); # 時間で並び替え
