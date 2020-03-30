<?php

namespace App\Http\Controllers\Admin;

use App\Models\Professor;
use App\Http\Requests\ProfessorRequest;
use App\Service\ProfessorService;
use App\Http\Controllers\Controller;
use App\DataTables\ProfessorDataTable;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProfessorDataTable $datatable)
    {
        return $datatable->render('Admin.professor.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.professor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
        $user = ProfessorService::store($request->all());
        if ($user['status']) {
            return redirect()->route('professor.index');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        # tem que compactar para trazer os dados 
        $professor = ProfessorService::edit($id);

        if ($professor['status']) {
            return view('Admin.professor.create', [
                'professor' =>$professor['user']
            ]);
        }
        
        return back()->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorRequest $request, $id)
    {
        $user = ProfessorService::update($request->all(), $id);

        if ($user['status']) {
            return redirect()->route('professor.index');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = ProfessorService::destroy($id);
        if ($user['status']) {
            return 'Contato excluido com sucesso';
        }
        return abort(403, 'Erro ao excluir, ' .$user['erro']);
    }
}