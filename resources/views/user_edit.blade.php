@extends('master')

@section('content')

<h2>Edit</h2>

@if (session()->has('message'))
    {{ session() -> get('message')}}

@endif



<form action="{{route('users.update', ['user' => $user->id]) }}" method="post">
@csrf
<input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="{{ $user -> name}}">
    <input type="text" name="email" value="{{ $user -> email}}">
    <button type="submit">Editar</button>
</form>
@endsection
