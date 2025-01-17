<?php
namespace App\Repositories;

use App\Models\Item;
use App\Models\Availability;
use Illuminate\Support\Facades\DB;

class ItemRepository implements ItemRepositoryInterface
{
    public function getAllItem()
    {
        return Item::with('availability')->get();
    }

    public function createItem(array $data){
        return DB::transaction(function () use ($data) {
            $item = Item::create($data);
            Availability::create([
                'item_masters_id' => $item->id,
                'count' => $data['stok'],
            ]);
            return $item;
        });
    }

    public function getByCat($data)
    {
        return Item::where('category_id', $data)->with('availability')
        ->get();
    }

    public function getById($data){
        return Item::find($data);
    }
}
