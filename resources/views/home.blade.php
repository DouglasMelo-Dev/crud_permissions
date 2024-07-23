@extends('layouts.master')

@section('title', 'Página Inicial')

<h1 class="container text-center mt-4 mb-4">Lista Usuarios

</h1>
@section('content')
    <div class="container mb-5 mt-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                {{-- @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                </tr>
            @endforeach --}}

            </tbody>
          </table>
    </div>
@endsection
