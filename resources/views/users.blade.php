@extends('layouts.master')

@section('title', 'Página Index')

@section('content')

<h1 class="container text-center mt-4 mb-4">Lista de Colaboradores</h1>
<p class="container text-center mt-4 mb-4">Ajuste os poderes de acesso de cada colaborador abaixo:</p>

<div class="container text-center mt-4 mb-4">
    <a class="link_users text-center btn btn-warning" href="{{ route('groups.permissions') }}">Ver Grupos e Permissões</a>
    <a class="link_users text-center btn btn-success" href="{{ route('users.from_company') }}">Usuarios e Permissoes</a>
</div>

@section('content')
    <div class="container mb-5 mt-5" style="max-width: 1200px; margin: 0 auto;">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Empresa</th>
                <th scope="col">Grupos</th>
                <th scope="col">Permissões</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->companies as $company)
                                {{ $company->name }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($user->groups as $group)
                                {{ $group->name }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($user->groups as $group)
                                @foreach($group->permissions as $permission)
                                    {{ $permission->description }}@if (!$loop->last), @endif
                                @endforeach
                            @endforeach
                        </td>
                        <td><a class="btn btn-info" href="{{ route('users.show', ['id' => $user->id ])}}">Ver</a> |
                            <a class="btn btn-dark" href="{{ route('users.edit', ['id' => $user->id])}}">Editar</a> |
                            <a class="btn btn-danger" href="">Deletar</a>


                        </td>
                    </tr>
            @endforeach

            </tbody>
          </table>
    </div>
@endsection
