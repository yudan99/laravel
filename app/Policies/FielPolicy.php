<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Fiel;

class FielPolicy extends Policy
{
    public function update(User $user, Fiel $fiel)
    {
        // return $fiel->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Fiel $fiel)
    {
        return true;
    }
}
