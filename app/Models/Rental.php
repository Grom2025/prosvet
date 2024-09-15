<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Filters\QueryFilter;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rentals';
    protected $guarded = false;

    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class,'rentals_id','id');
    }

    public function GroupRent(): BelongsTo
    {
        return $this->belongsTo(GroupRent::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }

}
