<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $departamentos = json_decode(file_get_contents(database_path('data/ubigeo_departamento.json')), true);
        $provincias = json_decode(file_get_contents(database_path('data/ubigeo_provincia.json')), true);
        $distritos = json_decode(file_get_contents(database_path('data/ubigeo_distrito.json')), true);

        // Insertar departamentos
        foreach ($departamentos as $dep) {
            if (!isset($dep['inei']) || !isset($dep['departamento'])) continue;

            DB::table('departaments')->insert([
                'code_inei' => $dep['inei'],
                'code_reniec' => $dep['reniec'] ?? null,
                'name' => $dep['departamento'],
                'iso_3166_2' => $dep['iso_3166_2'] ?? null,
                'latitude' => $dep['latitude'] ?? null,
                'longitude' => $dep['longitude'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insertar provincias
        foreach ($provincias as $prov) {
            if (!isset($prov['inei']) || !isset($prov['provincia']) || !isset($prov['departamento'])) continue;

            $departamento = DB::table('departaments')
                ->where('name', $prov['departamento'])
                ->first();

            if (!$departamento) continue;

            DB::table('provinces')->insert([
                'code_inei' => $prov['inei'],
                'code_reniec' => $prov['reniec'] ?? null,
                'departament_id' => $departamento->id,
                'name' => $prov['provincia'],
                'latitude' => $prov['latitude'] ?? null,
                'longitude' => $prov['longitude'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insertar distritos
        foreach ($distritos as $dist) {
            if (!isset($dist['inei']) || !isset($dist['distrito']) || !isset($dist['provincia']) || !isset($dist['departamento'])) continue;

            $departamento = DB::table('departaments')
                ->where('name', $dist['departamento'])
                ->first();

            if (!$departamento) continue;

            $provincia = DB::table('provinces')
                ->where('departament_id', $departamento->id)
                ->where('name', $dist['provincia'])
                ->first();

            if (!$provincia) continue;

            DB::table('districts')->insert([
                'code_inei' => $dist['inei'],
                'code_reniec' => $dist['reniec'] ?? null,
                'province_id' => $provincia->id,
                'name' => $dist['distrito'],
                'latitude' => $dist['latitude'] ?? null,
                'longitude' => $dist['longitude'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
