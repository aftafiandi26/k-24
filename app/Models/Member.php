<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'hp',
        'lahir',
        'kelamin',
        'ktp',
        'photo',
    ];

    protected $table = 'members';

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
