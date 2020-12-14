<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    //
    protected $fillable = ['course_id', 'edition_version', 'edition_introduce', 'is_open', 'is_newest', 'care', 'order'];

    protected $casts = ['is_open'=>'boolean', 'is_newest'=>'boolean'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }

    //让后台时间显示正常一点
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
