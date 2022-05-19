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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'likes');
    }

    /**
     * 記事一覧データを取得
     */
    public function getArticle()
    {
        try {
            $article = $this->get();
            return $article;
        } catch(\Exception $e) {
            Log::emergency('記事一覧データの取得に失敗しました');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    /**
     * 記事詳細データを取得
     */
    public function getArticleDetail($id)
    {
        try {
            $article = $this->find($id);
            return $article;
        } catch(\Exception $e) {
            Log::emergency('記事詳細データの取得に失敗しました');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    /**
     * ジャンルを検索する
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
            Log::emergency('記事ジャンルの検索に失敗しました');
            Log::emergency($e->getMessage());
            throw $e;
    }

    }
}
