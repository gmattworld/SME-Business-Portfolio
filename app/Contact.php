<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //Table Name
    protected $table = 'contact';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamp
    public $timestamps = true;
}