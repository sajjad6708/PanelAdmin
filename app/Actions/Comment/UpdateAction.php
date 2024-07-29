<?php

namespace App\Actions\Comment;

use App\Http\Requests\Admin\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UpdateAction
{
    public function execute(CommentRequest $request, Comment $comment, User $user)
    {
        DB::beginTransaction();
        try {
            $comment->update([
                'body' => $request->body,
                'commentable_id' => $request->post,
                'author_id' => $comment->user->id,
                'commentable_type' => Post::class,
            ]);

            $user = User::where('id', $comment->user->id)->first();
            $user->name = $request->name;
            $user->save();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return false;
        }
    }
}
