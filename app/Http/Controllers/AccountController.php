<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    /**
     * アカウント一覧を表示
     */
    public function showAccount(Account $account)
    {
        try {
            $account = $account->getAccount();
            Log::info(json_encode($account, JSON_UNESCAPED_UNICODE));
            return 'test';
        } catch(\Exception $e) {
            Log::emergency('アカウント一覧の表示に失敗しました;');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 学習時間が多い順にアカウントを表示
     */
    public function sortAccountByTime(Account $account)
    {
        try {
            $sortAccount = $account->getTime();
            Log::info(json_encode($sortAccount, JSON_UNESCAPED_UNICODE));
            return 'test';
        } catch(\Exception $e) {
            Log::emergency('学習時間ランキングの表示に失敗しました;');
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
