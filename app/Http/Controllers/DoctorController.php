<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Exibe o formulário para adicionar um novo médico.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Armazena um novo médico no banco de dados.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255', // Caso queira adicionar uma especialidade opcional
        ]);

        // Criação do médico
        Doctor::create([
            'name' => $request->name,
            'specialty' => $request->specialty,
        ]);

        return redirect()->route('doctors.create')->with('success', 'Médico adicionado com sucesso!');
    }
}
