<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rental_basket extends Model
{
    use HasFactory;
    protected $table = 'rental_baskets';
    protected $guarded = false;
}
