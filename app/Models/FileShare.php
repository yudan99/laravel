<?php

namespace App\Models;

class FileShare extends Model
{
    protected $fillable = ['sh_user_id', 'sh_time', 'sub_time', 'file_verify', 'file_status', 'file_type', 'file_introduction', 'fiels', 'tags', 'video_preview', 'pic_preview', 'tem_path', 'st_path', 'ini_price', 'cur_price', 'read_count', 'read_times', 'collect_count', 'forward_count', 'pay_count', 'down_count', 'down_times', 'email_count', 'email_times', 'order', 'excerpt', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
