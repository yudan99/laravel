<?php

use Illuminate\Database\Seeder;
use App\Models\FileShare;

class FileSharesTableSeeder extends Seeder
{
    public function run()
    {
        $file_shares = factory(FileShare::class)->times(50)->make()->each(function ($file_share, $index) {
            if ($index == 0) {
                // $file_share->field = 'value';
            }
        });

        FileShare::insert($file_shares->toArray());
    }

}

