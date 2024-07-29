<?php

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DestroyAction
{
    public function execute(Category $category)
    {
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();

            return false;
        }
    }
}
