<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function allTeam()
    {
        $team = $this->all();
        return $team;
    }

    public function getGenre($genre)
    {
        $team = $this->where('genre', $genre)->get();
        return $team;
    }

    public function searchTeamsByFee($minFee, $maxFee)
    {

        $query = $this->query();

        if (isset($minFee)) {
            $query->where('fee', '>=', $minFee);
        }

        if (isset($maxFee)) {
            $query->where('fee', '<=', $maxFee);
        }

        return $query->get();

    }
}
