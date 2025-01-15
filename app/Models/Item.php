<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item_masters';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_item, stok, available ,nama_item, spesifikasi, category_id, harga_per_hari, harga_per_jam	
        ',
    ];
}
