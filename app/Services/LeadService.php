<?php

namespace App\Services;

use App\Models\Lead;

class LeadService
{
    // Criação de um novo lead
    public function createLead($request)
    {
        // Aqui você pode adicionar qualquer lógica adicional, como validações personalizadas.
        return Lead::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'empresa' => $request->input('empresa'),
            'cnpj' => $request->input('cnpj'),
            'categoria' => $request->input('categoria'),
            'user_id' => $request->user()->id,  // Captura o user_id diretamente
        ]);
    }

    // Buscar um lead por ID
    public function findLeadById($id)
    {
        return Lead::findOrFail($id);
    }

    // Atualizar um lead
    public function updateLead($id, $data)
    {
        $lead = Lead::findOrFail($id);
        return $lead->update($data);
    }

    // Deletar um lead
    public function deleteLead($id)
    {
        $lead = Lead::findOrFail($id);
        return $lead->delete();
    }

    // Query para leads (pode ser customizada conforme necessidade)
    public function query()
    {
        return Lead::query();
    }

    public function markAsClient($id)
    {
        // Encontrar o lead pelo ID
        $lead = Lead::findOrFail($id);

        // Atualizar o campo 'cliente' para true
        $lead->cliente = true;
        return $lead->save();
    }

    public function markAsLead($id)
    {
        // Encontrar o lead pelo ID
        $lead = Lead::findOrFail($id);

        // Atualizar o campo 'cliente' para false (não cliente)
        $lead->cliente = false;
        return $lead->save();
    }
}
