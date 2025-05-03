<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MonthBurger extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable     = [
        'product_id',
        'date',
        'ingredients',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
