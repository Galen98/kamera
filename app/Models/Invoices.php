<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $table = 'invoice_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'store_name', 	
        'invoice_pict' 	
    ];
}
