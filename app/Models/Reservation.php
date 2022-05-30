<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * リレーション
     */
    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    /**
     * 予約の検索
     */
    public function searchReservation($studio, $date)
    {
        try {
            $query = $this->query();

            if (isset($studio)) {
                $query = $this->where('studio', $studio);
            }

            if (isset($date)) {
                $query = $this->where('date', $date);
            }

            $searchResult = $query->orderBy('start_time', 'asc')->with('band')->get();
            return $searchResult;

        } catch (\Exception $e) {
            Log::emergency('検索した予約情報の取得に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 予約時間の重複チェック
     */
    public function checkByDuplicates($studio, $date, $start_time, $end_time)
    {
        try {
            $checked = $this->whereStudio($studio)
                            ->where('date', $date)
                            ->where('start_time', '<', $end_time)
                            ->where('end_time', '>', $start_time)->get();
            return $checked;
        } catch (\Exception $e) {
            Log::emergency('予約情報の重複チェックに失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 予約情報の登録処理
     */
    public function createReservationData($postData)
    {
        try {
            $createData = $this->create($postData);
            return $createData;
        } catch (\Exception $e) {
            Log::emergency('予約情報の登録に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

}
