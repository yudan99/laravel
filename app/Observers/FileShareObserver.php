<?php

namespace App\Observers;

use App\Models\FileShare;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class FileShareObserver
{
    public function creating(FileShare $file_share)
    {
        //
    }

    public function updating(FileShare $file_share)
    {
        //
    }
}