<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Station extends Model {

    protected $table = 'stations';
    public $timestamps = true;

    public function points()
    {
        return $this->hasMany('App\Point');
    }


}