<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle', 'image'];

    public function projectPage() {
        return $this->hasOne(ProjectsPage::class);
    }
}
