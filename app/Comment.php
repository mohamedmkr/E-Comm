<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Student;

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
