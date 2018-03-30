<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Code extends Model {

    protected $table = 'codes';
    public $timestamps = true;


    public function points()
    {
        return $this->belongsToMany('App\Point','codes_points');
    }


}