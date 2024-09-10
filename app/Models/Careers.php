<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    use HasFactory;

    protected $fillable = [
        'comp-name',
        'job_title',
        'job_description',
        'job_requirements',
        'location',
        'job_type',
        'salary',
        'experience_level',
        'application_deadline',
        'company_logo',
    ];
}
