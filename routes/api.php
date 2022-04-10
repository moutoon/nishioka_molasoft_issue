<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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
Route::get('/member_detail/{member_id}', [MemberController::class, 'OutputMemberInformation']);
