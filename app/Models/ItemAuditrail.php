<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAuditrail extends Model
{
    use HasFactory;
    protected $table = 'item_auditrail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'item_masters_id',
        'qty',
        'date_change',
        'status'	
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_masters_id', 'id');
    }
}
