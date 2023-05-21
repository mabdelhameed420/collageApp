<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat;
use App\Models\Classroom;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;


class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'national_id',
        'email',
        'phone_no',
        'image',
        'password',
        'level',
        'state',
        'department_code',
        'department_id',
    ];
    protected $hidden = [
        'password',
    ];
    public function chat()
    {
        return $this->hasMany(Chat::class);
    }
    public function classroom()
    {
        return $this->hasMany(Classroom::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function commentReply()
    {
        return $this->hasMany(CommentReply::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
