<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Exceptions\CouponCodeUnavailableException;


class CouponCode extends Model
{
    //兑换码类型
    const TYPE_FIXED = 'fixed';
    const TYPE_PERCENT = 'percent';

    public static $typeMap = [
        self::TYPE_FIXED => '固定金额',
        self::TYPE_PERCENT => '比例',
    ];


    protected $fillable = ['name', 'code', 'type', 'value', 'total', 'used', 'min_amount', 'not_before', 'not_after', 'enabled'];

    protected $casts = ['enabled' => 'boolean'];

    protected $dates = ['not_before', 'not_after'];

    //访问
    protected $appends = ['description'];

    //自动生成描述,访问器
    public function getDescriptionAttribute(){
        $str = '';

        if ($this->min_amount > 0 ){
            //$str = '满'.$this->min_amount;
            $str = '满'.str_replace('.00', '', $this->min_amount);
        }
        if ($this->type === self::TYPE_PERCENT) {
            //return $str.'优惠'.$this->value.'%';
            return $str.'优惠'.str_replace('.00', '', $this->value).'%';
        }
        //return $str.'减'.$this->value;
        return $str.'减'.str_replace('.00', '', $this->value);
    }

    //让后台时间显示正常一点
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function Order(){
        return $this->hasMany(Order::class);
    }

    //随机生成兑换码
    public static function findAvailableCode($length = 4){
        do{
            //生成指定长度的随机字符串，并转大写
            $code = strtoupper(Str::random($length));
            //如果生成的已存在则循环
        }while(self::query()->where('code',$code)->exists());

        return $code;
    }

    //优惠码校验，checkAvailable() 方法接受一个参数 $orderAmount 订单金额。为了兼容用户下单前的校验，如果传入的 $orderAmount 是 null 则不去检查是否满足订单最低金额。
    public function checkAvailable($orderAmount = null)
    {
        if (!$this->enabled) {
            throw new CouponCodeUnavailableException('优惠券不存在');
        }

        if ($this->total - $this->used <= 0) {
            throw new CouponCodeUnavailableException('该优惠券已被兑完');
        }

        if ($this->not_before && $this->not_before->gt(Carbon::now())) {
            throw new CouponCodeUnavailableException('该优惠券现在还不能使用');
        }

        if ($this->not_after && $this->not_after->lt(Carbon::now())) {
            throw new CouponCodeUnavailableException('该优惠券已过期');
        }

        if (!is_null($orderAmount) && $orderAmount < $this->min_amount) {
            throw new CouponCodeUnavailableException('订单金额不满足该优惠券最低金额');
        }
    }

    //计算优惠后的金额
    public function getAdjustedPrice($orderAmount)
    {
        // 固定金额
        if ($this->type === self::TYPE_FIXED) {
            // 为了保证系统健壮性，我们需要订单金额最少为 0.01 元
            return max(0.01, $orderAmount - $this->value);
        }
        //百分比
        return number_format($orderAmount * (100 - $this->value) / 100, 2, '.', '');
    }

    //校验code
    public static function check($code)
    {
//        //判断是否存在
//        if (!$record = CouponCode::where('code', $code)->first()){
//            abort(404);
//        }
//
//        //如果没有生效，即等于不存在
//        if (!$record->enabled){
//            abort(404);
//        }
//
//        if ($record->total - $record->used <= 0){
//            return response()->json(['msg' => '该优惠码已被使用完'], 403);
//        }
//
//        if ($record->not_before && $record->not_before->gt(Carbon::now())){
//            return response()->json(['msg' => '当前优惠码没到使用时间'],403);
//        }
//
//        if ($record->not_after && $record->not_after->lt(Carbon::now())){
//            return response()->json(['msg' => '当前优惠码已过期'],403);
//        }

        //调用异常处理
        if (!$record = CouponCode::where('code', $code)->first()) {
            throw new CouponCodeUnavailableException('优惠券不存在');
        }

        //调模型里面已经定义好的校验函数，不通过则抛出异常终止流程
        $record->checkAvailable();

        return $record;

//        return view('coupon_codes.show', compact('coupon_code'));
    }

    //减少用量
    public function changeUsed($increase = true)
    {
        // 传入 true 代表新增用量，否则是减少用量
        if ($increase) {
            // 与检查 SKU 库存类似，这里需要检查当前用量是否已经超过总量
            return $this->where('id', $this->id)->where('used', '<', $this->total)->increment('used');
        } else {
            return $this->decrement('used');
        }
    }


}
