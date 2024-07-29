<?php

namespace App\Actions\Visit;

use App\Models\PostVisit;
use Carbon\Carbon;
use YogeshKoli\UserIP\UserIP;

class VisitPostAction
{
    public static function post_visit_check($post_id): void
    {
        $user_ip = UserIP::get();
        $last_visit = PostVisit::where('user_ip', $user_ip)?->orderBy('id', 'desc')?->first()?->created_at;
        $now = Carbon::now();

        if ($last_visit === null || abs($now->diffInMinutes($last_visit)) > 60) {
            PostVisit::create(['user_ip' => $user_ip, 'post_id' => $post_id]);
        }
    }
}
