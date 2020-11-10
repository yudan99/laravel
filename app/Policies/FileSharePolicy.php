<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FileShare;

class FileSharePolicy extends Policy
{
    public function update(User $user, FileShare $file_share)
    {
        // return $file_share->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, FileShare $file_share)
    {
        return true;
    }
}
