<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'companydetails'; // Ensure this refers to the correct table name

    public function user()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
