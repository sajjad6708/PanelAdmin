<?php

namespace App\Actions\Category;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class UpdateAction
{
    public function execute(Category $category, CategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $category->slug = null;
            $category->update($data);
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();

            return false;
        }
    }
}
