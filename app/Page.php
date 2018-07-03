<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //Table Name
    protected $table = 'pages';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamp
    public $timestamps = true;
}