<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;

    protected $table = "permissions";
    
    protected $fillable=[
        'name','parent_id','key_code'
    ];
    public function permission()
    {
        return $this->hasMany(permission::class, 'parent_id');
    }
    public function permissionParent()
    {
        return $this->belongsTo(permission::class, 'parent_id');
    }
}
