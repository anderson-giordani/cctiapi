<?php

namespace App\Http\Controllers\Animal;;

use App\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\AnimalRequest;

class AnimalController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animais = Animal::all();
        
        return $this->showAll($animais);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request)
    {
        $animal = Animal::create($request->all());

        return $this->showOne($animal, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        // $animal = Animal::findOrFail($id);
        return $this->showOne($animal);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        
        return $this->showOne($animal);
    }
}
