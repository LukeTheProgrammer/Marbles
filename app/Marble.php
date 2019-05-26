<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marble extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'delta',
    ];

    public function marbleActivities()
    {
        return $this->hasMany('App\MarbleActivity');
    }

}
