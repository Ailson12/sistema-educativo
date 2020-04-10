<?php

namespace App\Http\Controllers\Admin;

use App\Models\Curso;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Services\PdfService;

class PdfController extends Controller
{
    public function index()
    {
        $retorno = PdfService::getRelatorioData();
        return \PDF::loadView('admin.relatorio.index', [
            'relatorioData' => $retorno
            ])->stream();
    }
}