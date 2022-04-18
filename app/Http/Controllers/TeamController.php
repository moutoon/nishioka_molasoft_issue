<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    public function showTeamList(Team $team)
    {
        // test02 - Step2
        $allTeam = $team->allTeam();
        Log::info(json_encode($allTeam, JSON_UNESCAPED_UNICODE));
        return 'test';
    }

    public function genreTeams(Team $team, $genre = null)
    {
        //t test02 - Step3
        $genreTeams = $team->getGenre($genre);
        Log::info(json_encode($genreTeams, JSON_UNESCAPED_UNICODE));
        return 'test';
    }

    public function searchTeams(Request $request, Team $team)
    {
        $minFee = $request->input('minFee');
        $maxFee = $request->input('maxFee');
        $genre = $request->input('genre');
        $searchResult = $team->searchTeams($minFee, $maxFee, $genre);
        return $searchResult;
    }
}
