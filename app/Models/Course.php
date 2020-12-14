<?php

namespace App\Models;

use DateTimeInterface;

class Course extends Model
{
    protected $fillable = ['course_name', 'fiels', 'tags', 'cover', 'author', 'course_introduce', 'ini_price', 'cur_price', 'is_open','read_count', 'read_times', 'collect_count', 'forward_count', 'pay_count', 'clock_count', 'comment_count', 'problem_count', 'reply_count', 'care', 'order', 'excerpt', 'slug'];

    protected $casts = ['fiels'=>'array', 'tags'=>'array', 'is_open'=>'boolean'];

    public function fiel()
    {
        return $this->belongsToMany(File::class, 'fiels2courses', 'course_id','fiel_id');
    }

    public function edition()
    {
        return $this->hasMany(Edition::class);
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function addEditions($editions){
        if(!is_array($editions)){
            $$editions = compact('editions');
        }
        // 递归调用
        foreach ($editions as $column => $value) {
            $this->edition()->create($value);
        }
    }

    //让后台时间显示正常一点
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     //在用户删除时，同时执行
    //     static::deleting(function($course){
    //         //删除与教程相关的版本
    //         $course->edition->chapter->section()->delete();
    //         $course->edition->chapter()->delete();
    //         $course->edition()->delete();
    //     });
    // }
}
