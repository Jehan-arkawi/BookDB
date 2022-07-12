<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];

    public function books(){
        return $this->belongstoMany('App\Models\Book');
    }
}
