<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','content','organ_id'];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
