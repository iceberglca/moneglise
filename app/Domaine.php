<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    //
    protected  $table="domaine";
    //
    protected $fillable= ['id','libelle'];

}
