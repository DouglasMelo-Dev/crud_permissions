@extends('layouts.master')

@section('title', 'Detalhes do Usuário')

@section('content')
<h1 class="container text-center mt-4 mb-4">Detalhes do Usuário</h1>
<div class="container mb-5 mt-5" style="max-width: 1200px; margin: 0 auto;">
    <div>
        <h2>{{ $user->name }}</h2>
        <p><strong>E-mail:</strong> {{ $user->email }}</p>
        <p><strong>Empresas:</strong>
            @foreach($user->companies as $company)
                {{ $company->name }}@if (!$loop->last), @endif
            @endforeach
        </p>
        <p><strong>Grupos:</strong>
            @foreach($user->groups as $group)
                {{ $group->name }}@if (!$loop->last), @endif
            @endforeach
        </p>
        <p><strong>Permissões:</strong>
            @foreach($user->groups as $group)
                @foreach($group->permissions as $permission)
                    {{ $permission->description }}@if (!$loop->last), @endif
                @endforeach
            @endforeach
        </p>
    </div>
</div>
@endsection
