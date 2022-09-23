<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;


class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable=[
        'supplier_id',
        'unit_id',
        'category_id',
        'product_name',
        'quantity',
        'status',
        'created_by',
        'updated_by',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
