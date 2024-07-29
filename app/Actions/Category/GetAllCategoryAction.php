<?php

namespace App\Actions\Category;

use App\Models\Category;

class GetAllCategoryAction
{
    public static function GetAllCategoryAction()
    {
        return Category::all();
    }
}
