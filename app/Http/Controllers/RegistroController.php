<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\User;

class RegistroController extends Controller
{
    public function index()
    {
        $data['user_id'] = $userId;
        $registros = Registro::all();
        return view('registros.index', compact('registros'));
    }

    public function create()
{
    return view('registros_create');
}

    public function store(Request $request)
    {

    
        $registro = Registro::create([
            'tipo_interacao' => $request->input('tipo_interacao'),
            'data_interacao'  => $request->input('data_interacao'),
            'descricao_interacao'  => $request->input('descricao_interacao'),
            
        ]);

        if ($registro) {
            // Retorna para a view de criação de registro com uma mensagem de sucesso
            return redirect()->route('registros.create')->with('message', 'Registro criado com sucesso!');
        } else {
            return redirect()->route('registros.create')->with('message', 'Erro na criação do registro!');
        }
    }
    public function show(Registro $registro)
    {
        return view('registros_show',compact('registro'));
    }

    public function edit(Registro $registro)
    {
        return view('registros_edit',compact('registro'));
    }

    public function update(Request $request, Registro $registro)
    {
        $request->validate([
            // Coloque aqui as validações necessárias para os campos do registro
        ]);

        $registro->update($request->all());

        return redirect()->route('registros.index')->with('success','Registro atualizado com sucesso');
    }

    public function destroy(Registro $registro)
    {
        $registro->delete();

        return redirect()->route('registros.index')->with('success','Registro excluído com sucesso');
    }
}
