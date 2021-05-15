<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'craeted_at', 'updated_at'];

    public function courses() {
        return $this->hasMany(Course::class);
    }
}
