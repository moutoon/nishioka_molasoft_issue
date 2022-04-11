<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use  Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    public function showTeamList(Team $team)
    {
        Log::info($this->allTeam());
        return 'showTeamList';
    }

    public function genreSearchTeams(Request $request, Team $team)
    {
        return 'genreSearchTeams';
    }
}
