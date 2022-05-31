<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Band extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * リレーション
     */
    public function staffs()
    {
        return $this->belongsToMany(Staff::class, 'staffs_bands');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * バンド一覧を取得
     */
    public function getBand()
    {
        try{
            $band = $this->with('staffs')->get();
            return $band;
        } catch (\Exception $e) {
            Log::emergency('バンド一覧の取得に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * バンド情報の登録処理
     */
    public function createBandData($postData)
    {
        try {
            $createData = $this->create($postData);
            return $createData;
        } catch (\Exception $e) {
            Log::emergency('バンド情報の登録に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 中間テーブルに値を挿入する
     */
    public function insertJoinTable($band_id, $staff_id)
    {
        try {
            // $staff_idを','で区切って配列にする
            $staffIdCount = explode(',', $staff_id);
            $band = $this->find($band_id);

            // 部員情報が1人の場合
            if ($staffIdCount == 1) {
                $data = $band->staffs()->syncWithoutDetaching($staff_id);
                return $data;
            }

            // 部員情報が2人以上の場合
            if ($staffIdCount >= 2) {
                $data = $band->staffs()->syncWithoutDetaching($staffIdCount);
                return $data;
            }

            } catch (\Exception $e) {
                Log::emergency('中間テーブルの登録に失敗しました');
                Log::emergency($e->getMessage());
                return $e;
        }
    }
}
