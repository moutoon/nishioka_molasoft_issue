<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    /**
     * リレーション
     */
    public function account()
    {
        return $this->belongsTo(User::class);
    }

    public function accounts()
    {
        return $this->belongsToMany(Account::class, 'likes');
    }

    /**
     * 記事一覧情報を取得
     */
    public function getArticle()
    {
        try {
            $article = $this->get();
            return $article;
        } catch(\Exception $e) {
            Log::emergency('記事一覧情報の取得に失敗しました');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    /**
     * 記事詳細情報を取得
     */
    public function getArticleDetail($id)
    {
        try {
            $article = $this->find($id);
            return $article;
        } catch(\Exception $e) {
            Log::emergency('記事詳細情報の取得に失敗しました');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    /**
     * 学習ジャンルを検索する
     */
    public function getGenre($genre)
    {
        try {
            if (is_null($genre)) {
                $article = $this->get();
            } else {
                $article = $this->where('genre', $genre)->get();
            }
            return $article;
        }
        catch(\Exception $e) {
            Log::emergency('学習ジャンルの検索に失敗しました');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
