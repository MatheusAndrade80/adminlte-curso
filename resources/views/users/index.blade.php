@extends('layouts.default')
@section('page-title', 'Usuários')
@section('page-actions')
    <a href="{{ route('users.create') }}" class="btn btn-primary">Adicionar</a>
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


<form style="width: 500p" action="{{ route('users.index') }}" method="GET" class="mb-3">
    <div class="input-group input-group-sm">
        <input value="{{ request()?->keyword }}" type="text" name="keyword" class="form-control"
            placeholder="Pesquisar por nome ou email">
        <button type="submit" class="btn-primary">Pesquisar</button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @can('edit', \App\Models\User::class)
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm me-2">Editar</a>
                    @endcan
                    @can('destroy', \App\Models\User::class)
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    @endcan
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}
@endsection
