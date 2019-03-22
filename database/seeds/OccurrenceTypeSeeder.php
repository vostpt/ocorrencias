<?php

use Illuminate\Database\Seeder;

class OccurrenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = \Illuminate\Support\Facades\File::get('database/data/TiposOcorrencias.json');
        $data = json_decode($json);

        foreach ($data as $tipo) {
            \App\OccurrenceType::create([
                'code' => $tipo->Codigo,
                'name' => $tipo->Nome,
                'abreviatura' => $tipo->Abreviatura,
                'especieAbreviatura' => $tipo->EspecieAbreviatura,
                'familiaAbreviatura' => $tipo->FamiliaAbreviatura
            ]);
        }
    }
}
