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
        try {
            $allTeam = $team->allTeam();

            // リレーション課題
            $getAllTeamWithRank = $team->getAllTeamWithRank();
            // Log::info(json_encode($getAllTeamWithRank, JSON_UNESCAPED_UNICODE));

            // Laravel課題3 - 発展④
            $getJoinMember = $team->getJoinMember();
            Log::info(json_encode($getJoinMember, JSON_UNESCAPED_UNICODE));
            return 'test';

        } catch (\Exception $e) {
            Log::emergency('getJoinMember:' . $getJoinMember . 'メソッドエラー発生');
            Log::emergency($e->getMessage());
            return $e;
        }
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

    public function getTeamMemberInformation(Team $team)
    {
        $getMemberInformation = $team->getMemberInformation();
        Log::info(json_encode($getMemberInformation, JSON_UNESCAPED_UNICODE));
        return 'test';
    }
}
