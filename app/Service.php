<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //Table Name
    protected $table = 'service';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}