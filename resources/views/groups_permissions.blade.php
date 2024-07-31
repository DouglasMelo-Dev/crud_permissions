@extends('layouts.master')

@section('title', 'Edição de usuários')

@section('content')
<div class="container">
    <h1>Grupos e Permissões</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nome do Grupo</th>
                <th>Permissões</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>
                        @foreach($group->permissions as $permission)
                            <span class="badge bg-primary">{{ $permission->description }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
