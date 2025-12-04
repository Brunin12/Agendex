@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Criar Usuario</h1>
        </div>
        <div class="card-body mx-auto">
            <form action="{{ route('users.save') }}" method="POST">
            <input type="text" name="nome" id="nome" placeholder="Nome" required>
            <input type="email" name="email" id="email" placeholder="E-mail" required>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <button type="submit">Enviar</button>
        </form>
        </div>
    </div>
@endsection
