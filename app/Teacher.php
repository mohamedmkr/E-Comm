<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_link'
    ];
    protected $hidden = [

        'remember_token',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
