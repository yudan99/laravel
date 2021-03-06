<?php

namespace App\Models;

use DateTimeInterface;

class Section extends Model
{
    protected $fillable = ['chapter_id', 'edition_id', 'course_id', 'section_name', 'section_introduce', 'section_detail', 'is_open', 'is_charge', 'read_count', 'read_times', 'collect_count', 'forward_count', 'pay_count', 'clock_count', 'comment_count', 'problem_count', 'reply_count', 'care', 'order', 'excerpt', 'slug'];
    protected $casts = ['is_open'=>'boolean', 'is_charge'=>'boolean'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    //让后台时间显示正常一点
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
