<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Course::class)->times(3)->create();
//        $courses = factory(Course::class)->times(50)->make()->each(function ($course, $index) {
//            if ($index == 0) {
//                // $course->field = 'value';
//            }
//        });
//
//        Course::insert($courses->toArray());
    }

}

