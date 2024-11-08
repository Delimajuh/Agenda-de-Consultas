<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = ['name', 'specialty'];

    // Relacionamento com Appointment
    public function appointments()
    {
        return $this->hasMany(App\Models\Appointment::class);
    }
}
