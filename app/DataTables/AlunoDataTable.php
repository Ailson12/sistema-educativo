<?php

namespace App\DataTables;

use App\Models\Aluno;
use App\Models\Curso;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AlunoDataTable extends DataTable
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
            ->editColumn('curso_id', function($aluno){
                return Curso::find($aluno->curso_id)->nome;
            })
            ->addColumn('action', function($id){
                $acoes = link_to(
                    route('aluno.edit', $id),
                    'Editar',
                    ['class' => 'btn btn-sm btn-primary']
                );
                $acoes .= FormFacade::button(
                    'Excluir', 
                    [
                        'class' => 'btn btn-sm btn-danger ml-1',
                        'onclick' => "excluir('". route('aluno.destroy', $id) ."')"
                    ]
                );
                return $acoes;
            })
            ->editColumn('nome', function ($aluno) {
                return link_to(
                    route('aluno.show', $aluno),
                    "$aluno->nome",
                    ['title' => 'Mais detalhes sobre o aluno']
                );   
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Aluno $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Aluno $model)
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
                    ->setTableId('aluno-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->text('Adicionar Aluno'),
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
            Column::make('curso_id')
            ->title('Curso'),
            Column::computed('action')
            ->title('Ações'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Aluno_' . date('YmdHis');
    }
}
