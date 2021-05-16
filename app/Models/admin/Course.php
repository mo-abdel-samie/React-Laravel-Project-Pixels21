<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'rate', 'image', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function coursePage() {
        return $this->hasOne(CoursesPage::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
