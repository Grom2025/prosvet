<?php

namespace App\Models\Products;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductTag extends Model
{
    use HasFactory;
    public function mtags(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
