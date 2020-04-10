<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Curso;
use App\DataTables\AlunoDataTable;
use App\Http\Requests\AlunoRequest;
use App\Services\AlunoService;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AlunoDataTable $datatable)
    {
        return $datatable->render('admin.aluno.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = Curso::all()->pluck('nome', 'id');
        return view('admin.aluno.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        
        $retorno = AlunoService::store($request->all());
        if ($retorno['status']) {
            return redirect()->route('aluno.index')
                            ->withSucesso('Aluno salvo com sucesso');
        }

        return back()->withInput()
                    ->withFalha('Erro ao salvar');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        return view('admin.aluno.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $retorno = AlunoService::getAlunoPorId($id);
        if ($retorno['status']) {
            return view('admin.aluno.create', [
                'aluno' => $retorno['aluno'],
                'curso' => $retorno['curso']
            ]);
        }
        return back()->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoRequest $request, $id)
    {
        $retorno = AlunoService::update($request->all(), $id);
        if ($retorno['status']) {
            return redirect()->route('aluno.index')
                    ->withSucesso('Aluno atualizado com sucesso');
        }
        return back()->withInput()
                    ->withFalha('Erro ao salvar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retorno = AlunoService::destroy($id);
        if ($retorno['status']) {
            return 'excluido com sucesso';
        }

        return abort(403, 'Erro ao excluir, ' .$retorno['erro']);
    }
}
