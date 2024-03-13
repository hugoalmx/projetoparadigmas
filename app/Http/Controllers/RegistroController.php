<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Lead;

class RegistroController extends Controller
{

    
    public readonly Registro $registro;
    public function __construct(){
    $this->registro = new Registro();
    }

    public function index()
    {
        $registros = $this->registro->all();
        return view('registros', [ 'registros' => $registros]);
    }
    
    public function create(Request $request)
{   
    $registros = $this->registro->all();
    $leadId = $request->query('lead');
    
 
    if ($leadId) {
       
        $lead = Lead::find($leadId);

        if ($lead) {
    
            return view('registros_create', ['lead' => $lead, 'leadId' => $leadId, 'registros' => $registros]);
        } else {
      
            return redirect()->back()->with('error', 'Lead não encontrado.');
        }
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

        $leadId = $request->input('lead_id');
        
        if ($leadId) {
            $registro = Registro::create([
                'lead_id' => $leadId,
                'tipo_interacao' => $request->input('tipo_interacao'),
                'data_interacao'  => $request->input('data_interacao'),
                'descricao_interacao'  => $request->input('descricao_interacao'),
            ]);

            if ($registro) {
                return redirect()->route('registros.create')->with('message', 'Registro criado com sucesso!');
            } else {
                return redirect()->route('registros.create')->with('message', 'Erro na criação do registro!');
            }
        } else {
            return redirect()->route('registros.create')->with('message', 'ID do usuário não fornecido!');
        }
    }

    public function show($leadId)
    {
       
        $registros = Registro::where('lead_id', $leadId)->get();
       
        $lead = Lead::findOrFail($leadId);
    
  
        return view('registros_show', compact('registros', 'lead'));
    }

    public function edit($leadId, $registroId)

    {

        $lead = Lead::findOrFail($leadId);

        $registro = Registro::findOrFail($registroId);



        return view('registros_edit', compact('lead', 'registro'));

    }
    

    public function update(Request $request, $leadId, $registroId)
    {
        
        $registro = Registro::where('lead_id', $leadId)->where('id', $registroId)->first();
    
        if (!$registro) {
            return redirect()->back()->with('error', 'Registro não encontrado');
        }
    
        $registro->update($request->except(['_token', '_method']));
    
        session()->flash('success', 'Registro atualizado com sucesso!');
    
        return redirect()->back();
    }
    


    public function destroy($leadId, $registroId)
    {
        
        $registro = Registro::findOrFail($registroId);
    
        $lead = Lead::findOrFail($leadId);
    
        $registro->delete();

        return redirect()->route('registros.index', ['leadId' => $leadId])->with('success', 'Registro excluído com sucesso');
    }
}
