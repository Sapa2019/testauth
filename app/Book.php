<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Psy\Util\Str;

class Book extends Model
{
    protected $guarded = [];
    protected $table = 'book';
    protected $fillable = [
        'title',
        'author',
    ];

    public function path(){
        return '/books/'.$this->id;
    }
}
