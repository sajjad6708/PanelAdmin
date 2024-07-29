<?php

namespace App\DataTables;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CommentsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = new EloquentDataTable($query);

        // Add the column for action buttons
        $dataTable?->addColumn('action', function ($model) {
            $data = 'comments';

            return view('components.a_button', compact('data', 'model'));
        })
            ?->editColumn('created_at', function ($query) {
                return $query?->created_at?->format('Y/m/d');
            })
            ?->editColumn('updated_at', function ($query) {
                return $query?->updated_at?->format('Y/m/d');
            })
            ?->editColumn('content', function ($query) {
                return mb_substr($query?->content, 0, 40);
            });
        $column = request('filter_column');
        $value = request('filter_value');
        if ($column && $value) {
            $dataTable?->filter(function ($query) use ($column, $value) {
                $query?->where($column, 'like', '%'.$value.'%');
            });
        }

        return $dataTable;
    }

    public function query(Comment $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('comments-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->buttons([
                Button::make('add'),
                Button::make('excel'),
                Button::make('csv'),
                //                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ])
            ->parameters(['dom' => 'Bfrtip', 'initComplete' => 'function() {
                    var api = this.api();
                    $("#filter-button").on("click", function() {
                        api.ajax.reload();
                    });
                }', ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('user_name'),
            Column::make('parent_id'),
            Column::make('verification'),
            Column::make('post_id'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('action'),
        ];
    }

    protected function filename(): string
    {
        return 'Comments_'.date('YmdHis');
    }
}
