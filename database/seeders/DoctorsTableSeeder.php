<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::insert([
            ['name' => 'Dr. Ana Silva', 'specialty' => 'Cardiologia'],
            ['name' => 'Dr. João Santos', 'specialty' => 'Neurologia'],
            ['name' => 'Dr. Maria Oliveira', 'specialty' => 'Dermatologia'],
            ['name' => 'Dr. Pedro Souza', 'specialty' => 'Pediatra'],
            ['name' => 'Dr. Ana Souza', 'specialty' => 'Ginecologia'],
            ['name' => 'Dr. José Pereira', 'specialty' => 'Ortopedia'],
            ['name' => 'Dr. Carla Costa', 'specialty' => 'Oftalmologia'],
        ]);
    }
}
