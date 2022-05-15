<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
