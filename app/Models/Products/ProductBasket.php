<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBasket extends Model
{
    use HasFactory;
    protected $table = 'product_baskets';
    protected $guarded = false;
}
