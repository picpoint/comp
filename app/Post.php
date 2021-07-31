<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['hdr', 'cntnt', 'rubric_id'];


    public function rubric() {
        return $this->belongsTo('App\Rubric');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function dateTimeFormat() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->diffForHumans();
    }


}
