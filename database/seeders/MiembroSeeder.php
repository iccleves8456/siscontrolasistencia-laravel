<?php

namespace Database\Seeders;

use App\Models\Miembro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MiembroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
    /*    Miembro::create([
            'nombre_apellido'=> 'Ejemplo 1',
            'direccion'=> 'Lorem ipsun',
            'telefono' => '123456',
            'fecha_nacimiento' => '2020-01-10',
            'genero' => 'MASCULINO',
            'email' => Str::random(10).'@gmail.com',
            'estado' => '1',
            'ministerio' => 'PASTORAL',
            'fotografia' => 'foto.jpg',
            'fecha_ingreso' => '2024-02-19'

        ]);
    */

        Miembro::factory()->count(50)->create();
    }
  }
