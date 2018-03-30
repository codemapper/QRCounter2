<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Point extends Model {

    protected $table = 'points';
    public $timestamps = true;

    public function station()
    {
        return $this->belongsTo('App\Station');
    }

    public function users()
    {
        return $this->belongsToMany('App\Code');
    }


}