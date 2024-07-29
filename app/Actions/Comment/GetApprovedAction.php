<?php

namespace App\Actions\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class GetApprovedAction
{
    public function execute(Comment $comment)
    {
        DB::beginTransaction();
        try {
            $comment->approved = $comment->approved == 0 ? 1 : 0;
            $comment->save();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return false;
        }
    }
}
