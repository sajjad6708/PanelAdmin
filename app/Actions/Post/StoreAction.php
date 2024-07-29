<?php

namespace App\Actions\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\PostTag;
use App\Actions\Post\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostRequest;

class StoreAction extends Actions
{
    public function execute(PostRequest $request)
    {
    
 
            $data = $request->validated();

            $data['user_id'] = 1;
            // $date_string = $request->published_at;
            // $timestamp = strtotime(str_replace('/', '-', $date_string));
            // $data['published_at'] = date('Y-m-d', $timestamp);
            // dd($data['tags']);

            // if (isset($data['tags'])) {
            //     $tags = $data['tags'];
            //     $tagId = [];
            //     // dd($data);
            //     foreach ($tags as $tag) {
            //         $tagExist = Tag::where('name', $tag)->first();
            //         if ($tagExist) {
            //             $tagId[] = $tagExist->id;
            //         } else {
            //             $createTag = Tag::create(['name' => $tag]);
            //             $tagId[] = $createTag->id;
            //         }
            //     }
            //     $post = Post::create($data);
            //     foreach ($tagId as $tag) {
            //         PostTag::create([
            //             'post_id' => $post->id,
            //             'tag_id' => $tag,

            //         ]);
            //     }
            // } else {
            //     $post = Post::create($data);
            // }
            $post = Post::create($data);
            // if ($request->file('image')) {
            //     foreach ($request->file('image') as $image) {
            //         $post->addMedia($image)->toMediaCollection();
            //     }
            // }

            // if (isset($data['categories'])) {
            //     $post->categories()->sync($data['categories']);
            // } else {
            //     $post->categories()->sync([]);
            // }
            

    }
}
