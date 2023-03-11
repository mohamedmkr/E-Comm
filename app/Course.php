<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Categorey;
use App\Teacher;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'img_url',
        'price',
        'category_id',
        'teacher_id'
    ];
    public function categorey(){
        return $this->belongsTo(Categorey::class);
    }
    
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
