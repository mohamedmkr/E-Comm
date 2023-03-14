<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'student_id'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
