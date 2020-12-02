<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    //
    protected $fillable = ['edition_id', 'chapter_name', 'chapter_introduce', 'is_open', 'care', 'order'];

    protected $casts = ['is_open'=>'boolean'];
}
