<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
     use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'total_price',
        'sale_date',
    ];

    // Relationship to Product (if you have a Product model)
    public function product()
    {
        return $this->belongsTo(Product::class);

}
}