<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Code extends Model {

    protected $table = 'codes';
    public $timestamps = true;


    public function points()
    {
        return $this
            ->belongsToMany('App\Point')
            ->orderBy('code_point.created_at','desc')
            ->withTimestamps();
    }


}