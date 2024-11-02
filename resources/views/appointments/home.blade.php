@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-4 text-white">Bem-vindo ao Sistema de Agendamento de Consultas</h1>
    <p class="lead text-white">Navegue pelo menu para acessar as funcionalidades.</p>
    
    <div class="row mt-4">
        <!-- Funcionalidade 1 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('Seus Agendamentos') }}</h5>
                    <p class="card-text">{{ __('Visualize seus agendamentos.') }}</p>
                    <a href="{{ route('appointments.index') }}" class="btn btn-primary">{{ __('Acessar') }}</a>
                </div>
            </div>
        </div>

        <!-- Funcionalidade 2 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('Agendar') }}</h5>
                    <p class="card-text">{{ __('Agende Novas consultas.') }}</p>
                    <a href="{{ route('appointments.create') }}" class="btn btn-primary">{{ __('Acessar') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner de Fundo -->
<style>
    body {
        background: url('imagens/banner.png') no-repeat center center fixed; 
        background-size: cover;
        color: #000000;
    }

    .container {
        background-color: rgba(0, 0, 0, 0.6); /* Fundo semi-transparente para destacar o conteúdo */
        padding: 50px;
        border-radius: 10px;
    }

    .card {
        border: none;
    }

    .btn-primary {
        background-color: #007bff; /* Cor do botão */
        border-color: #007bff; /* Cor da borda do botão */
    }
</style>
@endsection
