<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model
{
    use SoftDeletes;

    protected $table = 'children';

    protected $fillable = [
      'name',
    ];

    public function marbleActivities()
    {
        return $this->hasMany('App\MarbleActivity');
    }

    /*
    public function addMarble () {
      $this->marbles = $this->marbles + 1;
      $this->save();
    }

    public function removeMarble () {
      $this->marbles = $this->marbles - 1;
      $this->save();
    }
    */
}
