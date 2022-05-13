<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_title',
        'number_of_groups',
        'student_per_group'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
