<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_interacao',
        'data_interacao',
        'descricao_interacao',
        'user_id',
        
        ];

    protected $casts = [

    ];

    public function user(){
        return $this->belongsTo(User::Class);
    }

    }