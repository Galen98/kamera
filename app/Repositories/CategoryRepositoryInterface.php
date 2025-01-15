<?php
namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function getAllCategory();
    public function createCategory(array $data);
}