<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    /**
     * Exibe o formulário de criação de agendamento com a lista de médicos.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $doctors = Doctor::all(); // Pega todos os médicos disponíveis
        return view('appointments.create', compact('doctors'));
    }

    /**
     * Armazena um novo agendamento na base de dados.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        
        // Validação dos dados do formulário
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctors,id', // Confirma se doctor_id existe na tabela doctors
            'appointment_date' => 'required|date',
        ]);
    
        // Criação do novo agendamento associado ao usuário logado
        Appointment::create([
            'user_id' => Auth::id(),
            'patient_name' => $request->patient_name,
            'doctor_id' => $request->doctor_id, // Certifique-se de que o doctor_id está incluído aqui
            'appointment_date' => $request->appointment_date,
        ]);
    
        // Redireciona com mensagem de sucesso
        return redirect()->route('appointments.create')->with('success', 'Consulta agendada com sucesso!');
    }
    

    /**
     * Exibe a lista de todos os agendamentos do usuário logado.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtendo o usuário logado
        $user = Auth::user();

        // Verifica se o usuário está autenticado e obtém suas consultas
        if ($user) {
            $appointments = Appointment::where('user_id', $user->id)
            ->with('doctor')  // Carrega o médico relacionado a cada consulta
            ->get();
        return view('appointments.index', compact('appointments'));
        }

        // Redireciona para login caso o usuário não esteja autenticado
        return redirect()->route('login')->withErrors('Você precisa estar logado para ver suas consultas.');
    }

    /**
     * Exclui um agendamento pelo ID.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Encontre o agendamento pelo ID
        $appointment = Appointment::find($id);

        // Verifica se o agendamento foi encontrado
        if (!$appointment) {
            return redirect()->route('appointments.index')->with('error', 'Agendamento não encontrado.');
        }

        // Exclui o agendamento
        $appointment->delete();

        // Redireciona com mensagem de sucesso
        return redirect()->route('appointments.index')->with('success', 'Agendamento excluído com sucesso.');
    }
}
