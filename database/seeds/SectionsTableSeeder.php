<?php

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    public function run()
    {
        $sections = factory(Section::class)->times(50)->make()->each(function ($section, $index) {
            if ($index == 0) {
                // $section->field = 'value';
            }
        });

        Section::insert($sections->toArray());
    }

}

