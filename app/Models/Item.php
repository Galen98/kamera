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
        'kode_item',
        'stok',
        'merk',
        'seri', 
        'nama_item',
        'spesifikasi', 
        'category_id',
        'harga_per_hari'
    ];

    public function availability()
    {
        return $this->hasOne(Availability::class, 'item_masters_id', 'id');
    }

    public static function generateCode($prefix) {
        $lastCode = self::where('kode_item', 'LIKE', $prefix . '/%')
                        ->orderBy('kode_item', 'desc')
                        ->first();

        if (!$lastCode) {
            return '/0001';
        }
    
        $lastNumber = (int) substr($lastCode->code, strlen($prefix) + 1); 
        $newNumber = $lastNumber + 1;

        return str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
    
}
