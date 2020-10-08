<?php

namespace App\DataTables;

use App\Models\Property;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PropertyDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'properties.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Property $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Property $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
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
            'title' => new Column(['title' => __('models/properties.fields.title'), 'data' => 'title']),
            'address' => new Column(['title' => __('models/properties.fields.address'), 'data' => 'address']),
            'lat' => new Column(['title' => __('models/properties.fields.lat'), 'data' => 'lat']),
            'lng' => new Column(['title' => __('models/properties.fields.lng'), 'data' => 'lng']),
            'status' => new Column(['title' => __('models/properties.fields.status'), 'data' => 'status']),
            'room_number' => new Column(['title' => __('models/properties.fields.room_number'), 'data' => 'room_number']),
            'property_age' => new Column(['title' => __('models/properties.fields.property_age'), 'data' => 'property_age']),
            'furnished' => new Column(['title' => __('models/properties.fields.furnished'), 'data' => 'furnished']),
            'air_conditioner' => new Column(['title' => __('models/properties.fields.air_conditioner'), 'data' => 'air_conditioner']),
            'space' => new Column(['title' => __('models/properties.fields.space'), 'data' => 'space']),
            'price' => new Column(['title' => __('models/properties.fields.price'), 'data' => 'price']),
            'note' => new Column(['title' => __('models/properties.fields.note'), 'data' => 'note']),
            'property_type_id' => new Column(['title' => __('models/properties.fields.property_type_id'), 'data' => 'property_type_id']),
            'property_categorie_id' => new Column(['title' => __('models/properties.fields.property_categorie_id'), 'data' => 'property_categorie_id'])
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
