<?php

namespace App\Http\Controllers\PessoaFisica;

use App\PessoaFisica;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\PessoaFisicaRequest;

class PessoaFisicaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoasFisicas = PessoaFisica::all();

        return $this->showAll($pessoasFisicas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaFisicaRequest $request)
    {
        $pessoaFisica = PessoaFisica::create($request->all());

        return $this->showOne($pessoaFisica, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PessoaFisica  $pessoaFisica
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaFisica $pessoaFisica)
    {
        return $this->showOne($pessoaFisica);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PessoaFisica  $pessoaFisica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaFisica $pessoaFisica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PessoaFisica  $pessoaFisica
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaFisica $pessoaFisica)
    {
        $pessoaFisica->delete();
        
        return $this->showOne($pessoaFisica);
    }
}
