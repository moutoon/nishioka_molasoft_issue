<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    /**
     * 予約時間を早い時間から順番に表示する
     */
    public function showSearchReservation(Reservation $reservation, Request $request)
    {
        $studio = $request->input('studio');
        $date = $request->input('date');

        try {
            $searchResult = $reservation->searchReservation($studio, $date);

            if ($searchResult->isEmpty()) {
                return '予約がありません';
            }
            return $searchResult;
        } catch (\Exception $e) {
            Log::emergency('予約の表示に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 予約の登録機能
     */
    public function createReservation(Request $request, Reservation $reservation)
    {
        $studio = $request->input('studio');
        $date = $request->input('date');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        $postData = $request->only([
            'studio',
            'band_id',
            'date',
            'start_time',
            'end_time',
        ]);

        try {
            // 重複チェック
            $checked = $reservation->checkByDuplicates($studio, $date, $start_time, $end_time);
            Log::info($checked);

            // 重複していたら登録できない
            if ($checked->isNotEmpty()) {
                return '予約が重複しています';
            }
            // 重複していなければ登録できる
            $createData = $reservation->createReservationData($postData);
            Log::info('予約の登録が完了しました');
            return $createData;
        } catch (\Exception $e) {
            Log::emergency('予約の登録に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
