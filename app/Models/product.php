<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price_origin',
        'price_current',
        'image_path',
        'desc',
        'user_id',
        'category_id',
        'view_count',
        'quantity'
    ];
    protected $table = 'products';

    public function color(){
        return $this->hasMany(color::class,'product_id');
    }
    public function size(){
        return $this->hasMany(size::class,'product_id');
    }
    public function category(){
        return $this->belongsTo(category::class,'category_id');
    }
}
