<?php

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Chapter::class)->times(27)->create();
    }
}
