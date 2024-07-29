<?php

namespace App\Actions\Category;

class AddFooterAction
{
    public static function addFooter($column, $model)
    {
        $model->$column = $model->add_in_footer === 0 ? 1 : 0;
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
