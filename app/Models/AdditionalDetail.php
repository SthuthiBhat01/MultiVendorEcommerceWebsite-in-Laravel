<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalDetail extends Model
{
    use HasFactory;
    protected $table = 'additional_details';
    protected $fillable = [
        'supported_by',
        'privacy_policy',
        'code_of_conduct',
        'general_terms',
    ];
}
