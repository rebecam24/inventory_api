<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity_available',
        'IVA',
        'url_image',
        'category_id',
        'provider_id',
    ];

    public function invoices(){
        return $this->belongsToMany(Invoice::class, 'sales', 'product_id','invoice_id')
                    ->withPivot('quantity','price','IVA')
                    ->withTimestamps();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
