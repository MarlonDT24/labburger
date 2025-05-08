<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_id',
        'state',
        'delivery_method',
        'date',
    ];

    //Relación de todos los Products con los Orders(N:M)
    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'total_price')->withTimestamps();
    }

    //Relación del User que ha creado el Order(1:N)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Función para calcular el precio total de los productos del pedido
    public function totalPrice()
    {
        return $this->products->sum('pivot.total_price');
    }
}
