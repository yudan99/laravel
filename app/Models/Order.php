<?php

namespace App\Models;

class Order extends Model
{
    const REFUND_STATUS_PENDING = 'pending';
    const REFUND_STATUS_APPLIED = 'applied';
    const REFUND_STATUS_PROCESSING = 'processing';
    const REFUND_STATUS_SUCCESS = 'success';
    const REFUND_STATUS_FAILED = 'failed';

//    const SHIP_STATUS_PENDING = 'pending';
//    const SHIP_STATUS_DELIVERED = 'delivered';
//    const SHIP_STATUS_RECEIVED = 'received';

    public static $refundStatusMap = [
        self::REFUND_STATUS_PENDING    => '未退款',
        self::REFUND_STATUS_APPLIED    => '已申请退款',
        self::REFUND_STATUS_PROCESSING => '退款中',
        self::REFUND_STATUS_SUCCESS    => '退款成功',
        self::REFUND_STATUS_FAILED     => '退款失败',
    ];

//    public static $shipStatusMap = [
//        self::SHIP_STATUS_PENDING   => '未发货',
//        self::SHIP_STATUS_DELIVERED => '已发货',
//        self::SHIP_STATUS_RECEIVED  => '已收货',
//    ];

    protected $fillable = ['order_no', 'user_id', 'total_amount', 'deal_amount', 'deal_type', 'paid_at', 'paid_type', 'paid_no', 'refund_status', 'refund_no', 'is_closed', 'is_open', 'remake', 'extra'];

    protected $casts = ['is_closed'=>'boolean', 'is_open'=>'boolean', 'extra'=>'json'];

    protected $datas = ['paid_at'];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        //监听创建事件，在写入数据库前触发
        static::creating(function ($model){
           //如果模型的order_no字段为空
            if (!$model->order_no){
                //生成订单流水号
                $model->order_no = static::findAvailableNo();
                //如果生成失败则终止创建订单
                if (!$model->order_no){
                    return false;
                }
            }
        });
    }

    public static function findAvailableNo(){
        //订单流水号前缀
        $prefix = date('YmdHis');
        for ($i = 0; $i < 10; $i++){
            //来个随机6位数
            $no = $prefix.str_pad(random_int(0,999999),6,'0',STR_PAD_LEFT);
            //判断是否已存在
            if (!static::query()->where('order_no',$no)->exists()){
                return $no;
            }
        }
        \Log::warning('find order no failed');

        return false;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

}
