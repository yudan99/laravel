<?php

namespace App\Models;

class Section extends Model
{
    protected $fillable = ['chapter_id', 'section_name', 'section_introduce', 'section_detail', 'is_open', 'is_charge', 'read_count', 'read_times', 'collect_count', 'forward_count', 'pay_count', 'clock_count', 'comment_count', 'problem_count', 'answer_count', 'care', 'order', 'excerpt', 'slug'];
}
