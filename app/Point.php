<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Point extends Model {

    protected $table = 'points';
    public $timestamps = true;

    public function stations()
    {
        return $this->belongsTo('Station');
    }

    public function users()
    {
        return $this->belongsToMany('Code');
    }


}