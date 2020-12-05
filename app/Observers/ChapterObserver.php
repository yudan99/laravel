<?php

namespace App\Observers;

use App\Models\Chapter;

class ChapterObserver
{
    //
    public function deleted(Chapter $chapter)
    {
        \DB::table('sections')->where('chapter_id', $chapter->id)->delete();
    }
}
