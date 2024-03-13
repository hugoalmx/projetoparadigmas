<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;

class LeadController extends Controller
{

    public readonly Lead $lead;
    public function __construct(){
    $this->lead = new Lead();
    }

    public function index(Request $request)
    {
        $userId = Auth::id();
    
        $query = $this->lead->query()
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
        if (auth()->check()) {
            $user_id = auth()->user()->id;

        if($user_id){
        $criar = Lead::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'empresa' => $request->input('empresa'),
            'cnpj' => $request->input('cnpj'),
            'categoria' => $request->input('categoria'),
            'user_id' => $user_id,
        ]);
        

        if ($criar) {
            return redirect()->back()->with('message', 'Lead criado com sucesso!');
        }
        return redirect()->back()->with('message', 'Erro na criação!');
    }
    }
    }

    
    public function show(Lead $lead)
    {
        return view('lead_show', ['lead' => $lead]);
    }

    
    public function edit(Lead $lead)
    {
        return view('lead_edit', ['lead' => $lead]);
    }

  
    public function update(Request $request, string $id)
    {
        $updated = $this->lead->where('id', $id) -> update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->back()->with('message', 'Alteração feita com sucesso!');
        }
        return redirect()->back()->with('message', 'Erro na alteração!');
    }

    
    public function destroy(string $id)
    {
       $this->lead->where('id', $id) -> delete();

return redirect()->route('leads.index');
    }

}

