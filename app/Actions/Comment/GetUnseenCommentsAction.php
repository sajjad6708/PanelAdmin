<?php

namespace App\Actions\Comment;

use App\Models\Comment;

class GetUnseenCommentsAction
{
    public static function GetUnseenCommentsAction()
    {
        $unseenComments = Comment::where('commentable_type', 'App\Models\Post')->where('seen', 0)->get();
        foreach ($unseenComments as $unseenComment) {
            $unseenComment->seen = 1;
            $result = $unseenComment->save();
        }
    }
}
