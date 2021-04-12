<?php

namespace app\Models;

use Illuminate\database\Eloquent\Factories\HasFactory;
use Illuminate\database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    public $table="house";
    public $timestamps=false;

}