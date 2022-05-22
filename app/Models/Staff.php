<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    /**
     * リレーション
     */
    public function bands()
    {
        return $this->belongsToMany(Band::class, 'staffs_bands');
    }

    /**
     * 部員一覧を取得
     */
    public function getStaff()
    {
        try{
            $staff = $this->with('bands')->get();
            return $staff;
        } catch (\Exception $e) {
            Log::emergency('部員一覧の取得に失敗');
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
