<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;
    protected $table = 'availabilitys';
    protected $primaryKey = 'id';

    protected $fillable = [
        'count',
        'item_masters_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_masters_id', 'id');
    }
}
