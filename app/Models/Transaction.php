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

    public static function generateCode() {
        $year = date('Y');
        $month = date('m');

        $lastCode = self::where('no_invoice', 'LIKE', "$year/$month/%")
                        ->orderBy('no_invoice', 'desc')
                        ->first();
        if (!$lastCode) {
            $newNumber = 1;
        } else {
            $parts = explode('/', $lastCode->no_invoice);
            $lastNumber = (int) end($parts);
            $newNumber = $lastNumber + 1;
        }
        $formattedNumber = str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        return "INV/$year/$month/$formattedNumber";
    }
    
}
