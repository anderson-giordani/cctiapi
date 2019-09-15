<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PessoaFisica extends Model
{
    use SoftDeletes;

    protected $table = 'pessoas_fisicas';
    
    protected $date = ['deleted_at'];

    protected $fillable = [
        'nome', 'cpf'
    ];

    public function setNomeAttribute($nome) 
    {
        $this->attributes['nome'] = strtolower($nome);
    }
    
    public function getNomeAttribute($nome) 
    {
        return ucwords($nome);
    }

    public function animais()
    {
        return $this->morphMany('App\Animal', 'dono');
    }

    public function PessoasJuridicas()
    {
        return $this->hasMany(App\PessoasJuridicas::class);
    }
}
