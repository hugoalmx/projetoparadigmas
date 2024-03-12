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
        'lead_id',
        
        ];

    protected $casts = [

    ];

    public function lead(){
        return $this->belongsTo(Lead::Class);
    }

    }