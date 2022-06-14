<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
