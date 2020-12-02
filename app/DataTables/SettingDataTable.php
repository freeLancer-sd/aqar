<?php

namespace App\DataTables;

use App\Models\Setting;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SettingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'settings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Setting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Setting $model)
    {
        return $model->newQuery();
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
            'title' => new Column(['title' => __('models/settings.fields.title'), 'data' => 'title']),
            'version' => new Column(['title' => __('models/settings.fields.version'), 'data' => 'version']),
            'version_last' => new Column(['title' => __('models/settings.fields.version_last'), 'data' => 'version_last']),
            'primary_color' => new Column(['title' => __('models/settings.fields.primary_color'), 'data' => 'primary_color']),
            'secondary_color' => new Column(['title' => __('models/settings.fields.secondary_color'), 'data' => 'secondary_color']),
            'logo' => new Column(['title' => __('models/settings.fields.logo'), 'data' => 'logo']),
            'mobile_first' => new Column(['title' => __('models/settings.fields.mobile_first'), 'data' => 'mobile_first']),
            'mobile_secondary' => new Column(['title' => __('models/settings.fields.mobile_secondary'), 'data' => 'mobile_secondary']),
            'whats_app_first' => new Column(['title' => __('models/settings.fields.whats_app_first'), 'data' => 'whats_app_first']),
            'whats_app_secondary' => new Column(['title' => __('models/settings.fields.whats_app_secondary'), 'data' => 'whats_app_secondary']),
            'fb_page' => new Column(['title' => __('models/settings.fields.fb_page'), 'data' => 'fb_page']),
            'tw_page' => new Column(['title' => __('models/settings.fields.tw_page'), 'data' => 'tw_page']),
            'snp_page' => new Column(['title' => __('models/settings.fields.snp_page'), 'data' => 'snp_page']),
            'ins_page' => new Column(['title' => __('models/settings.fields.ins_page'), 'data' => 'ins_page'])
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
