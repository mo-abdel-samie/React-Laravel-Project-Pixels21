<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle', 'image', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function projectPage() {
        return $this->hasOne(ProjectsPage::class);
    }
}
