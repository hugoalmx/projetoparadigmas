@extends('master')

@section('content')


<a href="{{ route('leads.create') }} ">Adicionar Lead</a>


<hr>

<h2>Users</h2>
<ul>
    @foreach ($leads as $lead)
      <li>Nome: {{$lead->name}} |
          E-mail: {{ $lead->email }} |
          Empresa: {{ $lead->empresa }} |
          CNPJ: {{ $lead->cnpj }} |
          Categoria: {{ $lead->tags }} |
          É Cliente? {{ $lead->cliente ? 'Sim' : 'Não' }} |

      <a href="{{ route('leads.edit',[ 'lead' => $lead->id]) }}"> Editar </a> |  <a>
      <a href="{{route('leads.show', ['lead' => $lead->id])}}"> Excluir </a></a>
      <a href="{{ route('registros.create', ['lead' => $lead->id]) }}">Adicionar Registro</a>
      
      </li>
    
    @endforeach
</ul>

<!-- Botão para ir para a página de inicio -->
<a href="{{ route('home') }}" class="btn btn-primary">Página Principal</a>



@endsection
