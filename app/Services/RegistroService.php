<?php

namespace App\Services;

use App\Models\Registro;
use App\Models\Lead;
use Illuminate\Support\Facades\DB;

class RegistroService
{
    public function getAllRegistros()
    {
        return Registro::all();
    }

    public function createRegistro(array $data)
    {
        return Registro::create($data);
    }

    public function getRegistrosByLead($leadId)
    {
        return Registro::where('lead_id', $leadId)->get();
    }

    public function findRegistro($leadId, $registroId)
    {
        return Registro::where('lead_id', $leadId)->where('id', $registroId)->first();
    }

    public function updateRegistro($registro, array $data)
    {
        return $registro->update($data);
    }

    public function deleteRegistro($registro)
    {
        return $registro->delete();
    }

    public function findLead($leadId)
    {
        return Lead::findOrFail($leadId);
    }
}
