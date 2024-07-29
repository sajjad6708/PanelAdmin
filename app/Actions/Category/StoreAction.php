<?php

namespace App\Actions\Category;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class StoreAction
{
    public function execute(CategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $categoryExist = Category::existCategory($request->name)->first();
            if ($categoryExist) {
                return $categoryExist;
            }

            $data = $request->validated();
            Category::create($data);
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();

            return false;
        }
    }
}
