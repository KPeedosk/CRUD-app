<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApplication extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cv_file', 'position_name', 'motivational_letter', 'references', 'additional_info', 'questions'];
}
