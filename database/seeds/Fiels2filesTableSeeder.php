<?php

use Illuminate\Database\Seeder;
use App\Models\FileShare;
use App\Models\Fiel;
use App\Handlers\UniqueRandHandler;

class Fiels2filesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $files = FileShare::all();

        foreach ($files as $file){
            $rand_ids = UniqueRandHandler::unique_rand();
            $file->addfiel($rand_ids);
        }

        //$fiel = Fiel::all();
        //$fiel_ids = $fiel->pluck('id')->toArray();

    }

}
