<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsPage extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'project_id'];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
