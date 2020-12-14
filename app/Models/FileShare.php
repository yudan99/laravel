<?php

namespace App\Models;

use DateTimeInterface;

class FileShare extends Model
{
    protected $fillable = ['user_id', 'sh_time', 'sub_time', 'file_verify', 'file_status', 'file_type', 'file_introduction', 'fiels', 'tags', 'video_preview', 'pic_preview', 'tem_path', 'st_path', 'ini_price', 'cur_price', 'read_count', 'read_times', 'collect_count', 'forward_count', 'pay_count', 'down_count', 'down_times', 'email_count', 'email_times', 'order', 'excerpt', 'slug'];
    protected $casts = ['fiels'=>'array', 'tags'=>'array'];

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
