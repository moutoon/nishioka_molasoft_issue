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
}
