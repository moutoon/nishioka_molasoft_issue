<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Log;

class Team extends Model
{
    use HasFactory;

    public function allTeam()
    {
        DB::table('teams')->all();
    }
}
