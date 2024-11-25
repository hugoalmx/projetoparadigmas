<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LeadService;  // Corrigido para LeadService
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    protected $leadService;

    // Injeta o LeadService
    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }

    public function index(Request $request)
    {
        $userId = Auth::id();

        $query = $this->leadService->query()
            ->where('user_id', $userId);

        if ($request->filled('cliente')) {
            $cliente = $request->input('cliente') == '1' ? true : false;
            $query->where('cliente', $cliente);
        }

        if ($request->filled('categoria')) {
            $query->where('categoria', 'like', '%' . $request->input('categoria') . '%');
        }

        $leads = $query->get();

        return view('leads', compact('leads'));
    }

    public function create(Request $request)
    {
        return view('lead_create');
    }

    public function store(Request $request)
    {
        // Usa o LeadService para criar o lead
        $lead = $this->leadService->createLead($request);

        if ($lead) {
            return redirect()->back()->with('message', 'Lead criado com sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao criar Lead!');
    }

    public function show($id)
    {
        $lead = $this->leadService->findLeadById($id);
        return view('lead_show', ['lead' => $lead]);
    }

    public function edit($id)
    {
        $lead = $this->leadService->findLeadById($id);
        return view('lead_edit', ['lead' => $lead]);
    }

    public function update(Request $request, $id)
    {
        // Caso o request seja para tornar o lead um cliente
        if ($request->has('cliente') && $request->input('cliente') == 1) {
            $updated = $this->leadService->markAsClient($id); // Chama o serviço para tornar o lead um cliente
        }
    
        // Caso o request seja para reverter para lead (não cliente)
        elseif ($request->has('remover_cliente') && $request->input('remover_cliente') == 1) {
            $updated = $this->leadService->markAsLead($id); // Chama o serviço para marcar o lead como não cliente
        } else {
            // Caso seja outra atualização
            $updated = $this->leadService->updateLead($id, $request->all());
        }
    
        if ($updated) {
            return redirect()->back()->with('message', 'Alteração feita com sucesso!');
        }
    
        return redirect()->back()->with('message', 'Erro na alteração!');
    }
    

    public function destroy($id)
    {
        $this->leadService->deleteLead($id);

        return redirect()->route('leads.index');
    }
}




