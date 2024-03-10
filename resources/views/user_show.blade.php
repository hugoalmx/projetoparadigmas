@extends('master')

@section('content')

<h2>User - {{$user -> name}}</h2>

<form action="{{route('users.destroy', ['user' => $user->id])}}" method="post">
@crsf
<input type="hidden" name="_method" value="DELETE">
<button type="submit">Excluir</button>

</form>

@endsection
