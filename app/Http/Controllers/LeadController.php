<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{

    public readonly Lead $lead;
    public function __construct(){
    $this->lead = new Lead();
    }

    public function index()
    {
        $leads = $this->lead->all();
        return view('leads', [ 'leads' => $leads]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lead_create');
    }

    
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = Lead::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'empresa' => $request->input('empresa'),
            'cnpj' => $request->input('cnpj'),
            'tags' => $request->input('tags'),
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'Lead criado com sucesso!');
        }
        return redirect()->back()->with('message', 'Erro na criação!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        return view('lead_show', ['lead' => $lead]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        return view('lead_edit', ['lead' => $lead]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->lead->where('id', $id) -> update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->back()->with('message', 'Alteração feita com sucesso!');
        }
        return redirect()->back()->with('message', 'Erro na alteração!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
$this->lead->where('id', $id) -> delete();

return redirect()->route('leads.index');
    }

}

