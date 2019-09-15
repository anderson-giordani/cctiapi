<?php

namespace App\Http\Controllers\PessoaJuridica;

use App\PessoaJuridica;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\PessoaJuridicaRequest;

class PessoaJuridicaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoasJuridica = PessoaJuridica::all();

        return $this->showAll($pessoasJuridica);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaJuridicaRequest $request)
    {
        $pj = PessoaJuridica::create($request->all());
        
        return $this->showOne($pj, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PessoaJuridica  $pessoaJuridica
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaJuridica $pj)
    {        
        return $this->showOne($pj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PessoaJuridica  $pessoaJuridica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaJuridica $pessoaJuridica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PessoaJuridica  $pessoaJuridica
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaJuridica $pessoaJuridica)
    {
        $pessoaJuridica->delete();

        return $this->showOne($pessoaJuridica);
    }
}
