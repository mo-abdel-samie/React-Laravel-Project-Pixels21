<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];

//    public function scopeSlogan($query, $id) {
//        return $query->where('id', '=',$id);
//    }
}
