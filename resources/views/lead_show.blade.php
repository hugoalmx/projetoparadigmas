@extends('master')

@section('content')

<h2>Registro - {{$registro -> id}}</h2>

<form action="{{route('registros.destroy', ['registro' => $resistro->id])}}" method="post">


@csrf]
<input type="hidden" name="_method" value="DELETE">
<button type="submit">Excluir</button>

</form>



@endsection
