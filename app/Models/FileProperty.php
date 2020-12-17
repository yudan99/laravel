<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileProperty extends Model
{
    //
    protected $fillable = ['name', 'value'];

    public function fileShare(){
        return $this->belongsTo(FileShare::class);
    }
}
