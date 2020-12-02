<?php

namespace App\Models;

class Course extends Model
{
    protected $fillable = ['course_name', 'fiels', 'tags', 'cover', 'author', 'course_introduce', 'ini_price', 'cur_price', 'is_open','read_count', 'read_times', 'collect_count', 'forward_count', 'pay_count', 'clock_count', 'comment_count', 'problem_count', 'reply_count', 'care', 'order', 'excerpt', 'slug'];

    protected $casts = ['fiels'=>'array', 'tags'=>'array', 'is_open'=>'boolean'];
}
