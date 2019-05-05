<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fidele extends Model
{
    //
    protected  $table="fideles";
    //
    protected $fillable= ['id','nom','prenoms','photo','datenais','lieunaiss','email','contact','contact2','sitmatrimonial','profession','nationalite'];
}
