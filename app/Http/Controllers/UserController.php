<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public readonly User $user;
    public function __construct(){
    $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users', [ 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }
    
    public function getUserId($userEmail)
    {
        // Busca o usuário (lead) na tabela de usuários pelo e-mail
        $user = User::where('email', $userEmail)->first();

        // Verifica se o lead foi encontrado e retorna seu ID
        if ($user) {
            return $user->id;
        } else {
            return null; // ou você pode lançar uma exceção, dependendo do seu caso
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'empresa' => $request->input('empresa'),
            'cnpj' => $request->input('cnpj'),
            'tags' => $request->input('tags'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'Lead criado com sucesso!');
        }
        return redirect()->back()->with('message', 'Erro na criação!');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        return view('user_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->user->where('id', $id) -> update($request->except(['_token', '_method']));

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
       $this->user->where('id', $id) -> delete();

       return redirect()->route('users.index');
    }

}

