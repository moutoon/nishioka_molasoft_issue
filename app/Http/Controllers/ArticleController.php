<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
    * 記事一覧をログ出力する
    */
    public function showArticle(Article $article)
    {
        try {
            $articles = $article->getArticle();
            Log::info(json_encode($articles, JSON_UNESCAPED_UNICODE));
            return 'test';
        } catch(\Exception $e) {
            Log::emergency('記事一覧のログ出力に失敗しました;');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
    * 記事詳細をログ出力する
    */
    public function getArticleDetail(Article $article, $id)
    {
        try {
            $articleDetail = $article->getArticleDetail($id);
            Log::info(json_encode($articleDetail, JSON_UNESCAPED_UNICODE));
            return 'test';
        } catch(\Exception $e) {
            Log::emergency('記事詳細のログ出力に失敗しました;');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
    * 記事の新規登録機能
    */
    public function createArticle(ArticleRequest $request)
    {
        try {
            $article = new Article;
            $postData = $request->only([
                'user_id',
                'text',
                'time',
                'genre',
            ]);
            $article->fill($postData)->save();
            return 'test';
        } catch(\Exception $e) {
            Log::emergency('記事の新規登録に失敗しました;');
            Log::emergency($e->getMessage());
            return $e;
        }

    }

    /**
     * 記事の編集機能
     */
    public function editArticle(ArticleRequest $request, Article $article, $id)
    {
        try {
            $article = $article->getArticleDetail($id);
            $postData = $request->only([
                'user_id',
                'text',
                'time',
                'genre',
            ]);
            $article->fill($postData)->save();
            return 'test';
        } catch(\Exception $e) {
            Log::emergency('記事の編集に失敗しました;');
            Log::emergency($e->getMessage());
            return $e;
        }

    }

    /**
     * 記事の削除機能
     */
    public function deleteArticle(Article $article, $id)
    {
        try {
            $article = $article->find($id);
            $article->delete();
            return 'test';
        } catch(\Exception $e) {
            Log::emergency('記事の削除に失敗しました;');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 記事ジャンルの検索
    */
    public function getArticleGenre(Article $article, $genre = null)
    {
        try {
            $getGenre = $article->getGenre($genre);

            if ($getGenre->isEmpty()) {
                Log::info(json_encode('学習した人のいないジャンルです', JSON_UNESCAPED_UNICODE));
                return 'test';
            } else {
                Log::info(json_encode($getGenre, JSON_UNESCAPED_UNICODE));
                return 'test';
            }
        } catch(\Exception $e) {
            Log::emergency('記事ジャンルの検索に失敗しました;');
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}