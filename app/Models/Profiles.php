<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    protected $table = 'user_profiles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
    ];
}
