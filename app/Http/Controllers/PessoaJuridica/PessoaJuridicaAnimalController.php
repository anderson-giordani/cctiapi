<?php

namespace App\Http\Controllers\PessoaJuridica;

use App\Animal;
use App\PessoaJuridica;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\AnimalRequest;

class PessoaJuridicaAnimalController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PessoaJuridica $pj)
    {
        $animais = $pj->animais; 

        return $this->showAll($animais);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request, PessoaJuridica $pj)
    {
        $data = $request->all();
        $data['dono_id'] = $pj->id;
        $data['dono_type'] = PessoaJuridica::class;

        $animal = Animal::create($data);

        return $this->showOne($animal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PessoaJuridica  $pessoaJuridica
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaJuridica $pessoaJuridica)
    {
        //
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
        //
    }
}
