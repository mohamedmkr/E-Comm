<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_link'
    ];
    public function comments(){

        return $this->hasMany(Comment::class);
    }
}
