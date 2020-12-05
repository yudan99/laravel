<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    //
    protected $fillable = ['edition_id', 'course_id','chapter_name', 'chapter_introduce', 'is_open', 'care', 'order'];

    protected $casts = ['is_open'=>'boolean'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }
}
