@extends('master')

@section('content')


<a href="{{ route('users.create') }} ">Adicionar Lead</a>


<hr>

<h2>Users</h2>
<ul>
    @foreach ($users as $user)
      <li>Nome: {{$user->name}} |
          E-mail: {{ $user->email }} |
          Empresa: {{ $user->empresa }} |
          CNPJ: {{ $user->cnpj }} |
          Categiria: {{ $user->tags }} |
          É Cliente? {{ $user->cliente ? 'Sim' : 'Não' }} |

      <a href="{{ route('users.edit',[ 'user' => $user->id]) }}"> Editar </a> |  <a>
      <a href="{{route('users.show', ['user' => $user->id])}}"> Excluir </a></a>
      <a href="{{ route('registros.create', ['user' => $user->id]) }}">Adicionar Registro</a>
     
      </li>
    
    @endforeach
</ul>

<!-- Botão para ir para a página de inicio -->
<a href="{{ route('home') }}" class="btn btn-primary">Página Principal</a>



@endsection
