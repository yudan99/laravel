<?php

namespace App\Observers;

use App\Models\Edition;

class EditionObserver
{
    //
    public function deleted(Edition $edition)
    {
        \DB::table('chapters')->where('edition_id', $edition->id)->delete();
    }
}
