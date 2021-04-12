<?php

namespace app\Models;

use Illuminate\database\Eloquent\Factories\HasFactory;
use Illuminate\database\Eloquent\Model;

class Roommate extends Model
{
    use HasFactory;
    public $table="roommate";
    public $timestamps=false;

}