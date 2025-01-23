<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = 'transaction_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'transaction_id', 
        'item_masters_id', 
        'qty',	
        'item_price',	
        'subtotal',
        'status',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'id');
    }
}
