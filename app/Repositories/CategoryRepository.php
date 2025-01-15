<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategory()
    {
        return Category::all();
    }

    public function createCategory(array $data){
        return Category::create($data);
    }
}
