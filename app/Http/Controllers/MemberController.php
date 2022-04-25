<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Member;
use PhpParser\Node\Stmt\ElseIf_;

class MemberController extends Controller
{
    public function showMemberList(Member $member, $area = null)
    {
        // 04 - Step3
            // $id1 = $member->searchMemberId();
            // Log::info(json_encode($id1, JSON_UNESCAPED_UNICODE));

        // 04 - Step4
            // $tokyoAreaMember = $member->tokyoAreaMember();
            // Log::info(json_encode($tokyoAreaMember, JSON_UNESCAPED_UNICODE));

        // 04 - Step5
            // $ageUnder30 = $member->ageUnder30();
            // Log::info(json_encode($ageUnder30, JSON_UNESCAPED_UNICODE));

        // 05 - Step1
            // $allMember = $member->all();
            // Log::info($allMember);

        // 05 - Step2
            // $allMember = $member->all();
            // $tokyoUser = $allMember->firstWhere('area', '東京');
            // Log::info($tokyoUser);

        // 05 - Step3
            // $allMember = $member->all();
            // $ageOver25 = $allMember->where('age', '>=', 25);
            // if (!empty($ageOver25))
            // {
            //     Log::info('25歳以上がいます。');
            // }

        // 05 - Step4
            // $allMember = $member->all();
            // $ageUnder20 = $allMember->filter(function ($member) {
            //     return $member['age'] <= 20;
            // });

            // if ($member->isNotEmpty)
            // {
            //     Log::info('20歳以下がいます。');
            // }

        // 05 - Step5
            // $allMember = $member->all();
            // Log::info($allMember->count());

        // 05 - Step6
            // $allMember = $member->all();
            // $tokyoMembers = $allMember->map(function ($member) {
            //         if ($member['area'] === '東京'){
            //             return $member;
            //         }
            //     });
            // Log::info($tokyoMembers);

        // 05 - Step7
            // $allMember = $member->all();
            // $areas = $allMember->pluck('area');
            // Log::info($areas);

        // 05 - Step8
            // $allMember = $member->get();
            // $sortMembers = $allMember->sortByDesc('age');
            // Log::info($sortMembers);


        // 07 - Step2
            // $allMember = $member->all();

        // 07 - Step3
        // $isEmptyArea = $member->getMemberArea($area)->isEmpty();

        // if (isset($area)) {
        //     $area = $member->getMemberArea($area);
        //     Log::info(json_encode($area, JSON_UNESCAPED_UNICODE));
        // }

        // if (!isset($area)) {
        //     $area = $member->all();
        //     Log::info(json_encode($area, JSON_UNESCAPED_UNICODE));
        // }

        // if ($isEmptyArea && isset($area)) {
        //     Log::info('該当するユーザーはいません');
        // }

        return 'test';
    }

    public function outputMemberInformation(Member $member, $member_id)
    {
        // リレーション課題02
        $getTeamIdInformation = $member->getTeamIdInformation($member_id);
        Log::info(json_encode($getTeamIdInformation, JSON_UNESCAPED_UNICODE));
        return 'test';
    }

    public function searchMembers(Request $request, Member $member)
    {
        // 07 - Step4
            // $minAge = $request->input('minAge');
            // return $minAge;

        // 07 - Step5
            // $allMember = $member->all();
            // $user = $allMember->where('age', '>=', $minAge);
            // return $user;

        // 07 - Step6
            $minAge = $request->input('minAge');
            $maxAge = $request->input('maxAge');

            if (isset($minAge, $maxAge)) {
                $outputMembers = $member->whereBetween('age', [$minAge, $maxAge]);
            }

            if (isset($minAge)) {
                $outputMembers = $member->where($minAge, '>=', 10);
            }

            if (isset($maxAge)) {
                $outputMembers = $member->where($maxAge, '<=', 10);
            }

            return $outputMembers->get();
    }
}