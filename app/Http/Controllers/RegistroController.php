<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\User;

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

    public function create()
{
    return view('registros_create');
}


public function getUserId($userName)
{
    // Busca o usuário (lead) na tabela de usuários pelo e-mail
    $user = User::where('name', $userName)->first();

    // Verifica se o lead foi encontrado e retorna seu ID
    if ($user) {
        return $user->id;
    } else {
        return null; //
    }
}
    public function store(Request $request)
    {
        $userName = $request->input('name');
        $userId = $this->getUserId($userName);
        if ($userId !== null) {
        $registro = Registro::create([
            'user_id' => $userId, // Define o user_id como o ID do usuário (lead)
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
    } else {
        return redirect()->route('registros.create')->with('message', 'Usuário não encontrado!');
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
