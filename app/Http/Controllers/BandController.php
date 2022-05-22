<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BandController extends Controller
{
    /**
     * 部員一覧を表示
     */
    public function showBandList(Band $band)
    {
        try {
            $showBand = $band->getBand();
            Log::info(json_encode($showBand, JSON_UNESCAPED_UNICODE));
            return 'バンド一覧をログ出力しました';
        } catch (\Exception $e) {
            Log::emergency('バンド一覧の表示に失敗');
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
