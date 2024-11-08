<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    public function run()
    {
        Doctor::create(['name' => 'Dr. João Silva', 'specialty' => 'Cardiologista']);
        Doctor::create(['name' => 'Dr. Maria Oliveira', 'specialty' => 'Dermatologista']);
        Doctor::create(['name' => 'Dr. Pedro Santos', 'specialty' => 'Pediatra']);
        Doctor::create(['name' => 'Dr. Ana Souza', 'specialty' => 'Ginecologista']);
        Doctor::create(['name' => 'Dr. José Pereira', 'specialty' => 'Ortopedista']);
        Doctor::create(['name' => 'Dr. Carla Costa', 'specialty' => 'Oftalmologista']);
        // Adicione mais registros conforme necessário
    }
}
