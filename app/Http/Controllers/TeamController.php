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
        Log::info(json_encode($team->allTeam(), JSON_UNESCAPED_UNICODE));
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

    // 500、1000、2000、5000
    // 最小料金が100、最大料金が1500だとfeeが1000と1500のチームだけがヒットする。
    // 最小料金が100の指定だけだと、全チームがヒットする。
    // 最大料金が100の指定だと、どのチームもヒットしない。
    // どちらの料金も指定がないと全件ヒットする。

        if (isset($minFee)) {
            $searchFee = $team->where('fee', '>=', $minFee);
        }

        if (isset($maxFee)) {
            $searchFee = $team->where('fee', '<=', $maxFee);
        }

        return $searchFee->get();
    }
}
