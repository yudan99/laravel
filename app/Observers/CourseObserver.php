<?php

namespace App\Observers;

use App\Models\Course;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class CourseObserver
{
    public function creating(Course $course)
    {
        //
    }

    public function updating(Course $course)
    {
        //
    }
    public function deleting(Course $course)
    {
        //dd($course>id);
        \DB::table('sections')->where('course_id', $course->id)->delete();
        \DB::table('chapters')->where('course_id', $course->id)->delete();
        \DB::table('editions')->where('course_id', $course->id)->delete();
    }

}
