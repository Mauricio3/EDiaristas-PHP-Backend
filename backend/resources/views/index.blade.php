@extends('app')

@section('titulo', 'Pagina Inicial')

@section('conteudo')
<h1>Lista de Diaristas</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($diaristas as $diarista)
        <tr>
            <th scope="row">{{$diarista->id}}</th>
            <td>{{$diarista->nome_completo}}</td>
            <td>{{$diarista->telefone}}</td>
            <td>
                <a href="{{route('diaristas.edit', $diarista)}}" class="btn btn-primary">Editar</a>
                <a href="{{route('diaristas.destroy', $diarista)}}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir a diarista ?')">Apagar</a>
            </td>
        </tr>
        @empty
        <tr>
            <th scope="row"></th>
            <td>Nenhum registro encontrado</td>
            <td></td>
            <td></td>
        </tr>
        @endforelse

    </tbody>
</table>
<a href="{{route('diaristas.create')}}" class="btn btn-success">Nova Diarista</a>
@endsection