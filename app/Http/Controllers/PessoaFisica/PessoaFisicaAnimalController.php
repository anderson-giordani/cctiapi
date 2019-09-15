<?php

namespace App\Http\Controllers\PessoaFisica;

use App\Animal;
use App\PessoaFisica;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\AnimalRequest;

class PessoaFisicaAnimalController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PessoaFisica $pf)
    {
        $animais = $pf->animais;

        return $this->showAll($animais);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request, PessoaFisica $pf)
    {
        $data = $request->all();
        $data['dono_id'] = $pf->id;
        $data['dono_type'] = PessoaFisica::class;

        $animal = Animal::create($data);

        return $this->showOne($animal);
    }
}
