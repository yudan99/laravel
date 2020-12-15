<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CouponCode;

class CouponCodePolicy extends Policy
{
    public function update(User $user, CouponCode $coupon_code)
    {
        // return $coupon_code->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, CouponCode $coupon_code)
    {
        return true;
    }
}
