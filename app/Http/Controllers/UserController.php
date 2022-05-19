<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * ユーザー一覧を表示
     */
    public function showUser(User $user)
    {
        try {
            $user = $user->getUser();
            Log::info(json_encode($user, JSON_UNESCAPED_UNICODE));
            return 'test';
        } catch(\Exception $e) {
            Log::emergency('ユーザー一覧の表示に失敗しました;');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 学習時間が多い順にユーザーを表示
     */
    public function sortUserByTime(User $user)
    {
        $sortUser = $user->getTime();
        Log::info(json_encode($sortUser, JSON_UNESCAPED_UNICODE));
        return 'test';
    }
}
