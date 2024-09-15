<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    use HasFactory;
    protected $table = 'product_pictures';
    protected $guarded = false;
    protected $fillable = ['product_id',  'url','fprimary'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
