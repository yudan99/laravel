<?php

use Illuminate\Database\Seeder;
use App\Models\CouponCode;

class CouponCodesTableSeeder extends Seeder
{
    public function run()
    {
        $coupon_codes = factory(CouponCode::class)->times(10)->make()->each(function ($coupon_code, $index) {
            if ($index == 0) {
                // $coupon_code->field = 'value';
            }
        });

        CouponCode::insert($coupon_codes->toArray());
    }

}

