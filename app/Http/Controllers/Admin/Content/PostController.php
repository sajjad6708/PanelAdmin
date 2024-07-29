<?php

namespace App\Http\Controllers\Admin\Content;
use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Post\StoreAction;
use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostsDataTable $dataTable): mixed
    {
        return $dataTable?->render('admin.content.posts.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $user = User::all();
        return view('admin.content.posts.create', compact('user')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request ,  StoreAction $action)
    {
        if ($action->execute($request)) {
            // GenerateSitemap::dispatch();

            return redirect()->route('posts.index')->with('alert-section-success', 'Post created successfully');
        } else {
            return redirect()->route('posts.index')->with('alert-section-error', 'Error in created the post');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
