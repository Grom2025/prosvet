<?php

namespace App\Models\Products;

use App\Filters\QueryFilter;
use App\Models\GroupRent;
use App\Models\Picture;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = false;

    public function ProductPicture(): HasMany
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function ProductGroup(): BelongsTo
    {
        return $this->belongsTo(ProductGroup::class);
    }

    public function tag(string $name): void
    {
        $tag = ProductTag::firstOrCreate(['name' => strtolower($name)]);

        $this->tags()->attach($tag);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(ProductTag::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
