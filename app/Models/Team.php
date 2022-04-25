<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Team extends Model
{
    use HasFactory;

    public function allTeam()
    {
        try {
            $team = $this->all();
            return $team;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function getGenre($genre)
    {
        $team = $this->where('genre', $genre)->get();
        return $team;
    }

    public function searchTeams($minFee, $maxFee, $genre)
    {

        $query = $this->query();

        if (isset($minFee)) {
            $query->where('fee', '>=', $minFee);
        }

        if (isset($maxFee)) {
            $query->where('fee', '<=', $maxFee);
        }

        if (isset($genre)) {
            $query->where('genre', $genre);
        }

        return $query->get();

    }

    // リレーション課題01
    public function rank()
    {
        return $this->hasOne(Rank::class, 'id', 'rank');
    }

    public function getAllTeamWithRank()
    {
        return $this->with('rank')->get();
    }

    // リレーション課題02
    public function member()
    {
        return $this->hasMany(Member::class, 'teamId', 'id');
    }

    // リレーション課題02-Step4
    public function members()
    {
        return $this->belongsToMember(Member::class, 'teams_members', 'memberId', 'teamId');
    }

    public function getMemberInformation()
    {
        return $this->with('member')->get();
    }

    // Laravel課題3 - 問題③
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'id', 'id');
    }

    // Laravel課題3 - 発展④
    public function getScheduleInformation()
    {
        return $this->with(['schedule.member'])->get();
    }
}