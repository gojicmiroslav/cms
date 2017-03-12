<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function getPathAttribute($value)
    {
    	return $this->directory . $value;
    }

    public static function scopeLatest($query)
    {
    	return $query->orderBy('id', 'desc')->get();
    }
}
