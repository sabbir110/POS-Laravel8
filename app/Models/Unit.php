<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table ='units';
    protected $fillable=[
        'unit_name',
        'status',
        'created_by',
        'updated_by',
    ];
}
