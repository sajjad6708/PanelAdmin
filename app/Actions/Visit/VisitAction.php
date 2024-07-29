<?php

namespace App\Actions\Visit;

use App\Models\Visit;
use Carbon\Carbon;
use YogeshKoli\UserIP\UserIP;

class VisitAction
{
    public static function visit_check(): void
    {
        $user_ip = UserIP::get();
        $last_visit = Visit::where('user_ip', $user_ip)?->orderBy('id', 'desc')?->first()?->created_at;
        $now = Carbon::now();

        if ($last_visit === null || abs($now->diffInMinutes($last_visit)) > 60) {
            Visit::create(['user_ip' => $user_ip]);
        }
    }
}
