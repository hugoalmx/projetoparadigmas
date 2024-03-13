@extends('master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Lead - {{ $lead->id }}</h2>
                    <h2>Lead - {{ $lead->name }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('leads.destroy', ['lead' => $lead->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
