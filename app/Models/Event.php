<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name','description','date_de_debut','date_de_fin','lieu','tarif','organ_id'];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
