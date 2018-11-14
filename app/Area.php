<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = "area";
    

    static function getAreas()
    {
        return Area::all();
    }

}
