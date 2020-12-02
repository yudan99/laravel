<?php

use Illuminate\Database\Seeder;
use App\Models\Edition;

class EditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Edition::class)->times(9)->create();
    }
}
