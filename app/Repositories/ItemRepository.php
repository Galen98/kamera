<?php
namespace App\Repositories;

use App\Models\Item;
use App\Models\ItemAuditrail;
use App\Models\Availability;
use App\Models\TransactionDetail;
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
            ItemAuditrail::create([
                'item_masters_id' => $item->id,
                'qty' => $data['stok'],
                'status' => 2,
                'date_change' => date('Y-m-d')
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

    public function getAllActiveItem(){
        return Item::where('status', 1)->with('availability')->get();
    }

    public function lastAvailable($data){
        return TransactionDetail::where('item_masters_id', $data)
        ->where('status', 0)
        ->sum('qty');
    }

    public function bookedStock($data){
        return TransactionDetail::where('item_masters_id', $data)
        ->where('status', 1)
        ->sum('qty');
    }

    public function stockAvailable($data){
        $count = Availability::find($data);
        return $count->count;
    }
}
