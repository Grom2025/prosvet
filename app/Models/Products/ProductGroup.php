<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;
    protected $table = 'product_groups';
    protected $guarded = false;

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
