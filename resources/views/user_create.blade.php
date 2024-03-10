@extends('master')

@section('content')

<h2>Criar Lead</h2>

@if (session()->has('message'))
    {{ session() -> get('message')}}

@endif



<form action="{{route('users.store')}}" method="post">
@csrf
    <input type="text" name="name" placeholder="Nome">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="password" placeholder="Senha">
    <button type="submit">Criar</button>
</form>
@endsection
