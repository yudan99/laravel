<?php

namespace App\Observers;

use App\Models\Chapter;

class ChapterObserver
{
    //
    public function deleting(Chapter $chapter)
    {
        \DB::table('sections')->where('chapter_id', $chapter->id)->delete();
    }
}
