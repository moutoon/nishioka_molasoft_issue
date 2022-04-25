<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Game extends Model
{
    use HasFactory;

    // Laravel振り返りテスト - 課題①
    public function allGame()
    {
        try {
            $game = $this->all();
            return $game;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    // Laravel振り返りテスト - 課題②
    public function searchGames($date, $venue, $genre)
    {
        try {
            $query = $this->query();

            if (isset($date)) {
                $query->where('date', $date);
            }
            if (isset($venue)) {
                $query->where('venue', $venue);
            }
            if (isset($genre)) {
                $query->where('genre', $genre);
            }

            return $query->get();
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
