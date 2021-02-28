<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['user_id','title'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id')->withDefault([
            'name' => 'Guest User'
        ]);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }
}
