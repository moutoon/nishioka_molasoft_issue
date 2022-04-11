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
        // 04 - Step 3
            // $id1 = $member->find(1);
            // Log::info($id1);

        // 04 - Step4
            // $tokyoArea = $member->where('area', '東京')->get();
            // Log::info($tokyoArea);

        // 04 - Step5
            // $under30 = $member->where('age', '<=', 30)->get();
            // Log::info($under30);

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
            // $tokyoMembers = $allMember
            //     ->where('area', '東京')
            //     ->map(function ($allMember) {
            //         return $allMember;
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
            // localhost/api/member_list/東京
            // にアクセスすると東京のユーザー情報が一覧出力される

            // localhost/api/member_list
            // にアクセスすると全ユーザー情報が一覧出力される

            // localhost/api/member_list/鹿児島
            // にアクセスすると該当するユーザーはいませんと出力される


        return 'test';
    }

    public function OutputMemberInformation(Member $member, $member_id)
    {
        // 07 - Step1
            // $allMember = $member->all();
            // Log::info($allMember->find($member_id));
            // return 'OutputMemberInformation';
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

        // 07 -Step6
            $minAge = $request->input('minAge');
            $maxAge = $request->input('maxAge');
            $allMember = $member->all();

            if (!empty($minAge && $maxAge)) {
                $outputMembers = $allMember->whereBetween('age', [$minAge, $maxAge]);
            } elseif (!empty($minAge)) {
                $outputMembers = $allMember->where('age', '>=', $minAge);
            } elseif (!empty($maxAge)) {
                $outputMembers = $allMember->where('age', '<=', $maxAge);
            } else {
                return $allMember;
            }

            return $outputMembers;

            // もっといい感じに書けるはず
            // minAge20・maxAge21を指定すると、2名分出力される
            // minAge90・maxAge nullを指定すると 90歳以上が出力される
            // minAge null ・ maxAge nullを指定すると全員出力される
            // minAge 90 ・ maxAge 1を指定すると誰も出力されない。
    }
}