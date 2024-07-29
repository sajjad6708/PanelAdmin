<?php

namespace App\Actions\Post;

use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateAction
{
    public function execute(Post $post, PostRequest $request)
    {
        DB::beginTransaction();
        try {
            // $old_images_nodelete = $request->_images ?? [];
            // foreach ($post->getMedia() as $image) {
            //     if (! in_array($image->id, $old_images_nodelete)) {
            //         $image->delete();
            //     }
            // }
            $data = $request->validated();
            $data['user'] = Auth::user()->id;
            // $date_string = $request->published_at;
            // $timestamp = strtotime(str_replace('/', '-', $date_string));
            // $data['published_at'] = date('Y-m-d', $timestamp);
            $post->slug = null;

            // if (isset($data['tags'])) {
            //     $tags = $data['tags'];
            //     $tagId = [];
            //     foreach ($tags as $tag) {
            //         $tagExist = Tag::where('name', $tag)->first();
            //         if ($tagExist) {
            //             $tagId[] = $tagExist->id;
            //         } else {
            //             $createTag = Tag::create(['name' => $tag]);
            //             $tagId[] = $createTag->id;
            //         }
            //     }
            //     $post->update($data);
            //     PostTag::where('post_id', $post->id)->delete();
            //     foreach ($tagId as $tag) {
            //         PostTag::create([
            //             'post_id' => $post->id,
            //             'tag_id' => $tag,
            //         ]);
            //     }
            // } else {
            //     $post->update($data);
            // }
            $post->update($data);
            // if ($request->image) {
            //     $post->clearMediaCollection();
            //     foreach ($request->file('image') as $image) {
            //         $post->addMedia($image)->toMediaCollection();
            //     }
            // }

            if (isset($data['category'])) {
                $post->categories()->sync($data['category']);
            } else {
                $post->category()->sync([]);
            }

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();

            return false;
        }
    }
}
