@extends('layouts.app')

@section('title', 'Lista de Consultas')

@section('content')
<div class="container mt-5 bg-custom">
    <div class="text-center mb-4">
        <img src="/imagens/banner.png" class="banner img-fluid" alt="Banner">
    </div>

    <h1 class="text-center">Consultas Agendadas</h1>

    @if($appointments->isEmpty())
        <p class="text-center">Nenhuma consulta agendada encontrada.</p>
    @else
        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Data e Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient_name }}</td>
                        <td>{{ $appointment->doctor_name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>
                            <!-- Botão de Cancelar -->
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar este agendamento?');">Cancelar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
