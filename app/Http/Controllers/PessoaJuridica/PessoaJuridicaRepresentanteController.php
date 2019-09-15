<?php

namespace App\Http\Controllers\PessoaJuridica;

use App\PessoaJuridica;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PessoaJuridicaRepresentanteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PessoaJuridica $pj)
    {
        $representante = $pj->representante;

        return $this->showOne($representante);
    }
}
