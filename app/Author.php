<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Author extends Model
{
    protected $guarded = [];
    protected $table = 'authors';
    protected $dates = ['dob'];
//    protected $fillable = [
//        'name',
//        'dob',
//    ];

    public function setDobAttribute($dob){
        $this->attributes['dob'] = Carbon::parse($dob);
    }



}
