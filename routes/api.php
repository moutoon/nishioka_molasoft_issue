<?php

use App\Http\Controllers\BandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TeamController;

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

// 沼田さん課題
Route::get('/band_list', [BandController::class, 'showBandList']);
Route::get('/staff_list', [StaffController::class, 'showStaffList']);
