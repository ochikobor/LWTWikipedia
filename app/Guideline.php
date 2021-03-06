<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guideline extends Model
{
    
    protected $fillable = ['title','content'] ;
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}