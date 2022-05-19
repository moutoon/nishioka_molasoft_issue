<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Account extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * リレーション
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'likes');
    }
    /**
     * アカウント情報の一覧を取得
     */
    public function getAccount()
    {
        try {
            $user = $this->get();
            return $user;
        } catch(\Exception $e) {
            Log::emergency('アカウント情報の取得に失敗しました');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    /**
     * 学習時間を取得
     */
    public function getTime()
    {
        try {
            $time = $this->with('articles')
            ->join('articles', 'articles.user_id', '=', 'users.id')
            ->orderBy('articles.time', 'DESC')
            ->get();
            return $time;
        } catch(\Exception $e) {
            Log::emergency('学習時間の取得に失敗しました');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
