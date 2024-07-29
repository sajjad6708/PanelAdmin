<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Resources\Post as ResourcesPost;
use App\Http\Resources\PostCollection;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Post::get() ;
        return new PostCollection(Post::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'slug' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'body' => ['required'],
            'user_id' => ['required'],
            'category_id' =>['string']

            // 'user_id' => ['required'],
        ]);
        return Post::create($data) ;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     return new ResourcesPost(Post::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'slug' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'body' => ['required'],
            'user_id' => ['required'],
            'category_id' =>['string']

            // 'user_id' => ['required'],
        ]);

        $post->update($data);
        return new ResourcesPost($post) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete() ;
        return response()->noContent() ;
    }
    
}
