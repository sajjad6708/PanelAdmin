<?php

namespace App\Actions\Post;

use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class DestroyAction
{
    public function execute(Post $post)
    {
        DB::beginTransaction();
        try {
            // if ($post->categories) {
            //     foreach ($post->categories as $category) {
            //         CategoryPost::where([
            //             'category_id' => $category->id,
            //             'post_id' => $post->id,
            //         ])->delete();
            //     }
            // }

            // $post->clearMediaCollection();
            $post->delete();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();

            return false;
        }
    }
}
