<?php

namespace App\Actions\Comment;

use App\Http\Requests\Admin\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class AnswerAction
{
    public function execute(CommentRequest $request, Comment $comment)
    {
        DB::beginTransaction();
        try {
            if ($comment->parent == null) {
                $inputs = $request->all();
                $inputs['author_id'] = $comment->user->id;
                $inputs['parent_id'] = $comment->id;
                $inputs['commentable_id'] = $comment->commentable_id;
                $inputs['commentable_type'] = $comment->commentable_type;
                $inputs['approved'] = 1;
                // $inputs['status'] = 1;
                $comment = Comment::create($inputs);
                DB::commit();

                return true;
            }
        } catch (\Exception $e) {
            DB::rollBack();

            return false;
        }
    }
}
