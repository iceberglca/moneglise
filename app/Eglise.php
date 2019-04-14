<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eglise extends Model
{
    //
    protected  $table="eglises";
    //
    protected $fillable= ['id','sigle','libelle'];

}
