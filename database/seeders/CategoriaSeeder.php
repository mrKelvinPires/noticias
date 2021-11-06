<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            "nome" => "Pòlitica",
        ]);

        Categoria::create([
            "nome" => "Economia",
        ]);

        Categoria::create([
            "nome" => "Esporte",
        ]);

        Categoria::create([
            "nome" => "Eleições",
        ]);
    }
}
