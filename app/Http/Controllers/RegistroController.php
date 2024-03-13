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
    $leadId = $request->query('lead'); // Obtém o valor do parâmetro 'lead' da URL
    
    // Verifica se o ID do usuário foi passado na URL
    if ($leadId) {
        // Busca o usuário pelo ID
        $lead = Lead::find($leadId);

        // Verifica se o usuário foi encontrado
        if ($lead) {
            // Retorna a visão 'registros_create' passando o usuário encontrado e seu ID
            return view('registros_create', ['lead' => $lead, 'leadId' => $leadId, 'registros' => $registros]);
        } else {
            // Se o usuário não for encontrado, redireciona de volta com uma mensagem de erro
            return redirect()->back()->with('error', 'Lead não encontrado.');
        }
    } else {
        // Se o parâmetro 'lead' não estiver presente na URL, redirecione de volta com uma mensagem de erro
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
        // Busca todos os registros associados ao lead_id
        $registros = Registro::where('lead_id', $leadId)->get();
        
        // Obtém o usuário pelo ID
        $lead = Lead::findOrFail($leadId);
    
        // Retorna a view 'registros_show' passando os registros e o usuário associado
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
        // Primeiro, localize o registro com base no $leadId e $registroId
        $registro = Registro::where('lead_id', $leadId)->where('id', $registroId)->first();
    
        // Verifique se o registro foi encontrado
        if (!$registro) {
            return redirect()->back()->with('error', 'Registro não encontrado');
        }
    
        // Atualize os dados do registro
        $registro->update($request->except(['_token', '_method']));
    
        // Flash a mensagem de sucesso na sessão
        session()->flash('success', 'Registro atualizado com sucesso!');
    
        // Redirecione de volta para a página de edição
        return redirect()->back();
    }
    


    public function destroy($leadId, $registroId)
    {
        // Encontrar o registro a ser excluído
        $registro = Registro::findOrFail($registroId);
    
        // Encontrar o Lead associado ao registro
        $lead = Lead::findOrFail($leadId);
    
        // Excluir o registro
        $registro->delete();
    
        // Redirecionar de volta para a página de registros do Lead
        return redirect()->route('registros.index', ['leadId' => $leadId])->with('success', 'Registro excluído com sucesso');
    }
}
