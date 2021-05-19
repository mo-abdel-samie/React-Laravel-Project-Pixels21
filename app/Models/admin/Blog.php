<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle', 'author', 'image', 'content', 'language', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

}
