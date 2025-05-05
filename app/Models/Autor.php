<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{
    use HasFactory;

    protected $table='autors';

    protected $fillable =[
        'nome',
        'cidade',
        'endereco',
        'bairro',
        'cep',
        'email',
        'telefone'
    ];

    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
