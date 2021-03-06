<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];
    use HasFactory;

    // public function user(){

    //     return $this->belongsTo(\App\Models\User::class,'user_id');
    // }

    public function user(){

        return $this->belongsTo(\App\Models\User::class,'user_id');
    }
}
