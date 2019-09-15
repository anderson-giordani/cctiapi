<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PessoaJuridica extends Model
{
    use SoftDeletes;

    protected $table = 'pessoas_juridicas';
    
    protected $date = ['deleted_at'];

    protected $fillable = [
        'razao_social', 'cnpj', 'representante_id'
    ];


    public function animais()
    {
        return $this->morphMany('App\Animal', 'dono');
    }

    public function representante()
    {
        return $this->belongsTo(PessoaFisica::class);
    }
}
