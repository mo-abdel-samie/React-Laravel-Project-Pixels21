<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsPage extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'project_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
