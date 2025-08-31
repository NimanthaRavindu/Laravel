<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
    ];

    public function bills()
            {
                return $this->hasMany(Bill::class);
            }
}
?>