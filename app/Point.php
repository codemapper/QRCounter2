<?php
namespace Bbc\MVC\Model;
use Illuminate\Database\Eloquent\Model;

class Point extends Model {

    protected $table = 'points';
    public $timestamps = true;

    public function stations()
    {
        return $this->belongsTo('Bbc\MVC\Model\Station');
    }

    public function users()
    {
        return $this->belongsToMany('Bbc\MVC\Model\User');
    }


}