<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['user_id','content'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
