<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use App\User;


class Rating extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'ra_user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'ra_product_id');
    }
}
