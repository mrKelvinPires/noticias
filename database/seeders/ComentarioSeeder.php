<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comentario::create ([
            'conteudo' => 'GOOOOOOOOOAAAAAAAAAAAAAALLLLLLLLL',
            'noticia_id' => 1
        ]);
    }
}
