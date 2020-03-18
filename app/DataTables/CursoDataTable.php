<?php

namespace App\DataTables;

use App\Models\Curso;
use App\Models\Professor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CursoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($curso) {
                $acoes = link_to(
                    route('curso.edit', $curso),
                    'Editar',
                    ['class' => 'btn btn-sm btn-primary']
                );

                $acoes .= FormFacade::button(
                    'Excluir',
                    [
                        'class' => 'btn btn-sm btn-danger ml-1',
                        'onclick' => "excluir('". route('curso.destroy', $curso) ."')"
                    ]
                );
                return $acoes;
            })
            ->editColumn('created_at', function($curso) {
                return $curso->created_at->format('d/m/y');
            })
            ->editColumn('professor_id', function($curso) {
                return Professor::find($curso->professor_id)->nome;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Curso $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Curso $model)
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
                    ->setTableId('curso-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->text('Adicionar Curso'),
                        Button::make('export')->text('Exportar'),
                        Button::make('print')->text('Imprimir')
                    )
                    ->parameters([
                        'language' => ['url' => '//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json']
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
            Column::make('id'),
            Column::make('nome'),
            Column::make('professor_id')
            ->title('Professor'),
            Column::make('created_at')
            ->title('Data de Criação'),
            Column::computed('action')
            ->exportable(false)
            ->title('Ações')
            ->printable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Curso_' . date('YmdHis');
    }
}
