<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable=[
        'name',
        'price',
        'stock',
        'category',
    ];

    public function billItems()
            {
                return $this->hasMany(BillItem::class);
            }

}
