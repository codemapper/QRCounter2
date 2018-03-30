<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Point extends Model {

    protected $table = 'points';
    public $timestamps = true;

    public function codes()
    {
        return $this->belongsToMany('App\Code','codes_points');
    }

    public function station()
    {
        return $this->belongsTo('App\Station');
    }
}