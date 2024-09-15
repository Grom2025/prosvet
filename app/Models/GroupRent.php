<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupRent extends Model
{
    use HasFactory;
    protected $table = 'group_rents';
    protected $guarded = false;

    public function rental(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}
