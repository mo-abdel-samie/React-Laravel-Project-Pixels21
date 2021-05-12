<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category', 'rate', 'image', 'details'];

    public function scopeAllCat($query) {
        return $query->where('category', 'all');
    }
    public function scopePower($query) {
        return $query->where('category', 'power');
    }
    public function scopeCs($query) {
        return $query->where('category', 'cs');
    }
    public function scopeMechanics($query) {
        return $query->where('category', 'mechanics');
    }
}
