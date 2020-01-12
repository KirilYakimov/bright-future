<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_text', 'post_image'
     ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
