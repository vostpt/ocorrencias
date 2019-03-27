<?php

use Illuminate\Database\Seeder;

class AcronymsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = \Illuminate\Support\Facades\File::get('database/data/acronimos.json');
        $data = json_decode($json);

        foreach ($data as $tipo) {
            \App\Acronym::create([
                'acronym'     => $tipo->acronimo,
                'description' => $tipo->descricao,
            ]);
        }
    }
}
