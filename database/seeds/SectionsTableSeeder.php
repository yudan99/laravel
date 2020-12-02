<?php

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Section::class)->times(81)->create();
//        $sections = factory(Section::class)->times(50)->make()->each(function ($section, $index) {
//            if ($index == 0) {
//                // $section->field = 'value';
//            }
//        });
//
//        Section::insert($sections->toArray());
    }

}

