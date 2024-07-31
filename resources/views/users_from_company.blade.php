@extends('layouts.master')

@section('title', 'Usuários da Mesma Empresa')

@section('content')

<div class="container mb-5 mt-5" style="max-width: 1200px; margin: 0 auto;">
    <h1 class="text-center mb-5">Usuários da Mesma Empresa</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID do Usuário</th>
                <th>Nome do Usuário</th>
                <th>Email do Usuário</th>
                <th>Módulo</th>
                <th>Permissão</th>
                <th>Descrição do Módulo</th>
                <th>Descrição da Permissão</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->user_email }}</td>
                <td>{{ $user->module_description }}</td>
                <td>{{ $user->permission_id }}</td>
                <td>{{ $user->module_description }}</td>
                <td>{{ $user->permission_description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

