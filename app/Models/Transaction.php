<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $primaryKey = 'id';

    protected $fillable = [
        'no_invoice', 
        'customer_name',
        'no_wa',
        'total_amount',
        'dibayar',
        'hari_sewa',
        'tgl_sewa',
        'tgl_kembali',
        'status',
        'penalty',
        'payment_status',
        'overdue',
        'notes',
        'invoice_status'	
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
}
