<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarbleActivity extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'child_id',
        'marble_id',
    ];

    public function child()
    {
        return $this->belongsTo('App\Child');
    }

    public function marble()
    {
        return $this->belongsTo('App\Marble');
    }
}
