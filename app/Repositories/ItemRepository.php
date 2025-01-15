<?php
namespace App\Repositories;

use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{
    public function getAllItem()
    {
        return Item::all();
    }

    // public function createItem(array $data){
    //     return Item::create($data);
    // }
}
