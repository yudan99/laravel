<?php

namespace App\Models;

use DateTimeInterface;

class FileShare extends Model
{
    protected $fillable = ['user_id', 'sh_time', 'sub_time', 'file_verify', 'file_status', 'file_type', 'file_introduction', 'fiels', 'tags', 'video_preview', 'pic_preview', 'tem_path', 'st_path', 'ini_price', 'cur_price', 'read_count', 'read_times', 'collect_count', 'forward_count', 'pay_count', 'down_count', 'down_times', 'email_count', 'email_times', 'order', 'excerpt', 'slug'];
    protected $casts = ['fiels'=>'array', 'tags'=>'array'];

    public function getGroupedPropertiesAttribute()
    {
        return $this->fileProperty
            // 按照属性名聚合，返回的集合的 key 是属性名，value 是包含该属性名的所有属性集合
            ->groupBy('name')
            ->map(function ($fileProperty) {
                // 使用 map 方法将属性集合变为属性值集合
                return $fileProperty->pluck('value')->all();
            });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fiel()
    {
        return $this->belongsToMany(Fiel::class, 'fiels2files', 'file_id','fiel_id');
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function fileProperty(){
        return $this->hasMany(FileProperty::class);
    }

    public function addFiel($fiel_ids){
        if(!is_array($fiel_ids)){
            $fiel_ids = compact('fiel_ids');
        }
        $this->fiel()->sync($fiel_ids, false);
    }

    public function unFiel($fiel_ids){
        if(!is_array($fiel_ids)){
            $fiel_ids = compact('fiel_ids');
        }
        $this->fiel()->detach($fiel_ids);
    }

    //让后台时间显示正常一点
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
