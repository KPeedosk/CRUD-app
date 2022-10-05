<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'age', 'sex', 'personal_code', 'country', 'email', 'language_skills', 'data_processing_allowed'];

    protected $casts = ['data_processing_allowed' => 'boolean'];
}
