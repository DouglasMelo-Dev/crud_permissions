@extends('layouts.master')

@section('title', 'Edição de usuários')

@section('content')

<h1 class="container text-center mt-4 mb-4">Editar</h1>
<p class="container text-center mt-4 mb-4">Ajuste os poderes de acesso do colaborador abaixo:</p>


<div class="container_edit container mb-5 mt-5" style="max-width: 400px; margin: 0 auto;">

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <form class="pt-2 pb-4" action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="input_container_edit">
            <input class="form-input mb-3" type="text" name="name" value="{{ $user->name }}">
            <input class="form-input mb-3" type="text" name="email" value="{{ $user->email }}">
        </div>

        <div class="container_edicao">
            <p class="titulo_tipo_edicao">Edição de Vagas</p>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Criar</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Alterar</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Apenas visualizar</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Deletar</label>
            </div>
        </div>

        <div class="container_edicao">
            <p class="titulo_tipo_edicao">Edição de Testes</p>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Criar</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Alterar</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Apenas visualizar</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Deletar</label>
            </div>
        </div>

        <button class="btn btn-success mt-4" type="submit">Salvar</button>
    </form>

</div>

@endsection
