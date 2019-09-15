<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use SoftDeletes;

    /**
     * Adicionar identificador aleatório ao criar novo animal
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->identificador = $model->generateRandomIdentificator(14);
            
        });
    }

    const MACHO = 'M';
    const FEMEA = 'F';

    protected $date = ['deleted_at'];

    protected $table = 'animais';

    protected $fillable = [
        'raca', 
        'sexo', 
        'dono_type', 
        'dono_id'
    ];

    public function dono()
    {
        return $this->morphTo();
    }

    /**
     * Criar um identificador para o Animal
     * 
     * OBS: Solução pode variar dependendo do intuito,
     * caso o identificador seja ultilizado apenas a nivel de programação, e não tivese a limitação de 
     * 14 caracteres imposto no desafio, utilizar UUID seria mais eficaz.
     * 
     */
    protected function generateRandomIdentificator($strength = 10) {

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        $random_string = substr(time().str_shuffle($permitted_chars), 0, $strength);
     
        return $random_string;
    }
}
