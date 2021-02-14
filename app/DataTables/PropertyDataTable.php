<?php

namespace App\DataTables;

use App\Models\Property;
use App\Models\PropertyCategory;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PropertyDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'properties.datatables_actions')
            ->editColumn('status', function ($query) {
                if ($query->status == 1) return 'جديد';
                if ($query->status == 2) return 'بنتظار الموافقة';
                if ($query->status == 3) return 'تم الموافقة';
                if ($query->status == 4) return 'مخفي';
            })
            ->editColumn('property_categorie_id', function (Property $property) {
                return $property->propertyCategorie->title;
            })
            ->editColumn('user_id', function (Property $property) {
                return $property->user->name;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Property $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Property $model)
    {
        return $model->where('property_categorie_id', '!=', 13)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    [
                        'extend' => 'create',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-plus"></i> ' . __('auth.app.create') . ''
                    ],
                    [
                        'extend' => 'export',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-download"></i> ' . __('auth.app.export') . ''
                    ],
                    [
                        'extend' => 'print',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-print"></i> ' . __('auth.app.print') . ''
                    ],
                    [
                        'extend' => 'reset',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-undo"></i> ' . __('auth.app.reset') . ''
                    ],
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-refresh"></i> ' . __('auth.app.reload') . ''
                    ],
                ],
                'language' => [
                    'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
//            'title' => new Column(['title' => __('models/properties.fields.title'), 'data' => 'title']),
            'id' => new Column(['title' => __('models/properties.fields.id'), 'data' => 'id']),
            'user_id' => new Column(['title' => __('models/properties.fields.user_id'), 'data' => 'user_id']),
            'address' => new Column(['title' => __('models/properties.fields.address'), 'data' => 'address']),
            'status' => new Column(['title' => __('models/properties.fields.status'), 'data' => 'status']),
            'space' => new Column(['title' => __('models/properties.fields.space'), 'data' => 'space']),
            'price' => new Column(['title' => __('models/properties.fields.price'), 'data' => 'price']),
            'property_categorie_id' => new Column(['title' => __('models/properties.fields.property_categorie_id'), 'data' => 'property_categorie_id']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return '$MODEL_NAME_PLURAL_SNAKE_$datatable_' . time();
    }
}
