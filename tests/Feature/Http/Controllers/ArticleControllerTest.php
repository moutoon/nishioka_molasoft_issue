<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        dd(env('APP_ENV'), env('DB_DATABASE'), env('DB_CONNECTION'));
    }

    /**
     * @test
     */
    public function 記事にアクセスできる()
    {
        $response = $this->json('GET', '/api/article');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function 記事の登録ができる()
    {
        Article::factory()->create([
            'user_id' => 1,
            'text' => 'test1',
            'time' => 1,
            'genre' => 'PHP'
        ]);

        $this->assertDatabaseHas('articles', [
            'user_id' => 1,
            'text' => 'test1',
            'time' => 1,
            'genre' => 'PHP'
        ]);
    }

    /**
     * @test
     */
    public function 記事の削除ができる()
    {
        Article::factory()->create([
            'user_id' => 1,
            'text' => 'test1',
            'time' => 1,
            'genre' => 'PHP'
        ]);

        $article = Article::find(1);
        $article->delete();
        $this->assertSoftDeleted($article);
    }

}
