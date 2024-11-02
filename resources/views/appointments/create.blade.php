@extends('layouts.app')

@section('title', 'Agendar Consulta')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Consulta</title>
    <!-- Incluindo o CSS do Bootstrap via CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Agendar Consulta</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="patient_name">Nome do Paciente:</label>
                <input type="text" class="form-control" name="patient_name" id="patient_name" required>
            </div>

            <div class="form-group">
                <label for="doctor_id">Nome do Médico:</label>
                <select name="doctor_id" id="doctor_id" class="form-control" required>
                    <option value="">Selecione um médico</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="appointment_date">Data e Hora da Consulta:</label>
                <input type="datetime-local" class="form-control" name="appointment_date" id="appointment_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Agendar Consulta</button>
        </form>
    </div>

    <!-- Incluindo o JavaScript do Bootstrap via CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Validação em JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector("form").addEventListener("submit", function(event) {
                let valid = true;
                const inputs = document.querySelectorAll("input[required], select[required]");
                inputs.forEach(input => {
                    if (!input.value) {
                        input.classList.add("is-invalid");
                        valid = false;
                    } else {
                        input.classList.remove("is-invalid");
                    }
                });

                if (!valid) {
                    event.preventDefault();
                    alert("Por favor, preencha todos os campos obrigatórios.");
                }
            });
        });
    </script>
</body>
</html>
@endsection
