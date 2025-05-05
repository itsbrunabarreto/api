<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table='livros';

    protected $fillable =[
        'nome',
        'edicao',
        'area'
    ];

    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    public function autor(){
        $this->belongsTo(Autor::class);
    }

    public function editora(){
        $this->belongsTo(Editora::class);
    }
}
