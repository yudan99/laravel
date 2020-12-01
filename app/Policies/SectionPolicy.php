<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Section;

class SectionPolicy extends Policy
{
    public function update(User $user, Section $section)
    {
        // return $section->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Section $section)
    {
        return true;
    }
}
