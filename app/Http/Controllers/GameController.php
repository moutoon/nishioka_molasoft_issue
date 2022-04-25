<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    // Laravel振り返りテスト - 課題①
    public function showGameList(Game $game)
    {
        $allGame = $game->allGame();
        Log::info(json_encode($allGame, JSON_UNESCAPED_UNICODE));
        return 'test';
    }

    // Laravel振り返りテスト - 課題②
    public function showSearchGames(Request $request, Game $game)
    {
        $date = $request->input('date');
        $venue = $request->input('venue');
        $genre = $request->input('genre');
        $result = $game->searchGames($date, $venue, $genre);
        Log::info(json_encode($result, JSON_UNESCAPED_UNICODE));
        return 'test';
    }
}
