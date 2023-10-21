<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rate',
    ];

    protected $table = "currency";

    // public function invoices(){
    //     return $this->belongsToMany(Invoice::class, 'rates', 'currency_id','invoice_id')
    //                 ->withPivot('rate')
    //                 ->withTimestamps();
    // }
}
