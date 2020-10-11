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
        'author_id',
    ];

    public function path(){
        return '/books/'.$this->id;
    }

    public function setAuthorIdAttribute($author){
        $this->attributes['author_id'] = (Author::firstOrCreate([
            'name'=>$author
        ]))->id;
    }
}
