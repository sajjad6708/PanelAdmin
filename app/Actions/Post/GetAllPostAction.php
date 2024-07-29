<?php

namespace App\Actions\Post;

use App\Models\Post;

class GetAllPostAction
{
    public static function GetAllPostAction()
    {
        return Post::all();
    }
}
