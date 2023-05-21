<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentAffair;


class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'national_id',
        'email',
        'image',
        'phone_no',
        'password',
    ];


    protected $hidden = [
        'created_at',
        'updated_at',
        'password',
    ];
    public function  studentAffair()
    {
        return $this->hasMany(StudentAffair::class);
    }
}
