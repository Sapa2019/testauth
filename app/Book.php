<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];
    protected $table = 'book';
    protected $fillable = [
        'title',
        'author',
    ];
}
