<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesPage extends Model
{
    use HasFactory;
    protected $fillable = ['header_image', 'header_desc', 'description', 'content', 'includes_titles', 'includes_icons', 'average_rate', 'share_links', 'course_id'];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
