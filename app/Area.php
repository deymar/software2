<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = "area";
    

    Protected static function getAreas()
    {
        return Area::all();
    }

    protected static function getArea($id)
    {
        $area = Area::find($id);
        return $area;
    }

}
