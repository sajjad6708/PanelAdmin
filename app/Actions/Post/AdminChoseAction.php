<?php

namespace App\Actions\Post;

class AdminChoseAction
{
    public static function adminChose($column, $model)
    {
        $model->$column = $model->admin_chose === 0 ? 1 : 0;
        if ($model->save()) {
            if ($model->$column === 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
