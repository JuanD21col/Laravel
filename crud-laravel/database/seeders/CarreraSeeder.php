<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carreras = ['MATEMATICA', 'ESPAÑOL', 'SOCIALES', 'INFORMATICA', 'INGLES', 'ARTISTICA'];

        foreach($carreras as $carrera){
            DB::table('carreras')->insert([
                'nombre' => $carrera
            ]);
        }
    }
}
