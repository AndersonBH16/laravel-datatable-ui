<?php

namespace App\DataTables;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PersonalDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'personal.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Persona $model): QueryBuilder
    {
        return $model->newQuery()
//            ->select('personas.*', 'usuarios.condicion', 'papeletas.nro', 'detpapeletas.hsalida', 'detpapeletas.hregreso')
            ->select('personas.*', 'usuarios.condicion')
            ->leftJoin('usuarios', 'personas.idpers', '=', 'usuarios.idpers');
//            ->leftJoin('papeletas', 'personas.idpers', '=', 'papeletas.idpers')
//            ->leftJoin('detpapeletas', 'papeletas.idpapeleta', '=', 'detpapeletas.idpapeleta');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('personal-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('idpers'),
            Column::make('apellidos'),
            Column::make('nombres'),
            Column::make('cargo'),
            Column::make('plaza'),
            Column::make('condicion'),
//            Column::make('nro'),
//            Column::make('hsalida'),
//            Column::make('hregreso'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Personal_' . date('YmdHis');
    }
}
