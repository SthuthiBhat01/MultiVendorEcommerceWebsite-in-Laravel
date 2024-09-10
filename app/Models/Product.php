<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user()
{
    return $this->belongsTo(User::class, 'added_by'); // Make sure 'added_by' matches the actual foreign key column name
}
// In Product model
public function offer()
{
    return $this->hasOne(Offer::class);
}


public function offers()
{
    return $this->hasMany(Offer::class);
}
// In your Product model


// public function companyDetail()
// {
//     return $this->hasOne(Company::class, 'product_id'); // Assuming 'product_id' is the foreign key in the companydetails table pointing to the products table
// }


}
