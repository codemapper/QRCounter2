<?php
namespace Bbc\MVC\Model;
use Illuminate\Database\Eloquent\Model;

class Station extends Model {

    protected $table = 'stations';
    public $timestamps = true;

    public function points()
    {
        return $this->hasMany('Bbc\MVC\Model\Point');
    }


}