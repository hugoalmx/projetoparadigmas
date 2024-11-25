<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RegistroService;
use App\Services\LeadService;

class RegistroController extends Controller
{
    private RegistroService $registroService;

    public function __construct(RegistroService $registroService)
    {
        $this->registroService = $registroService;
    }

    public function index()
    {
        $registros = $this->registroService->getAllRegistros();
        return view('registros', ['registros' => $registros]);
    }

    public function create(Request $request)
    {
        $leadId = $request->query('lead');

        if ($leadId) {
            $lead = $this->registroService->findLead($leadId);

            return view('registros_create', ['lead' => $lead, 'leadId' => $leadId]);
        } else {
            return redirect()->back()->with('error', 'O parâmetro "lead" não foi fornecido na URL.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_interacao' => 'required',
            'data_interacao' => 'required|date',
        ]);

        $data = $request->only(['lead_id', 'tipo_interacao', 'data_interacao', 'descricao_interacao']);
        $registro = $this->registroService->createRegistro($data);

        if ($registro) {
            return redirect()->route('registros.index', ['leadId' => $data['lead_id']])->with('message', 'Registro criado com sucesso!');
        } else {
            return redirect()->route('registros.create')->with('message', 'Erro na criação do registro!');
        }
    }

    public function show($leadId)
    {
        $registros = $this->registroService->getRegistrosByLead($leadId);
        $lead = $this->registroService->findLead($leadId);

        return view('registros_show', compact('registros', 'lead'));
    }

    public function edit($leadId, $registroId)
    {
        $lead = $this->registroService->findLead($leadId);
        $registro = $this->registroService->findRegistro($leadId, $registroId);

        return view('registros_edit', compact('lead', 'registro'));
    }

    public function update(Request $request, $leadId, $registroId)
    {
        $registro = $this->registroService->findRegistro($leadId, $registroId);

        if (!$registro) {
            return redirect()->back()->with('error', 'Registro não encontrado');
        }

        $this->registroService->updateRegistro($registro, $request->except(['_token', '_method']));

        return redirect()->back()->with('success', 'Registro atualizado com sucesso!');
    }

    public function destroy($leadId, $registroId)
    {
        $registro = $this->registroService->findRegistro($leadId, $registroId);

        if ($registro) {
            $this->registroService->deleteRegistro($registro);
            return redirect()->route('registros.index', ['leadId' => $leadId])->with('success', 'Registro excluído com sucesso');
        }

        return redirect()->back()->with('error', 'Erro ao excluir registro');
    }
}
