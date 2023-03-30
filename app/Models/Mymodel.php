<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mymodel extends Model
{
    use HasFactory;
    protected $table ='themodel';
    protected $primaryKey = 'id';
    protected $fillable =[
        'modelname',
        'modeldescribtion',
        'modelphoto',
        'modelpath'
    ];

}
