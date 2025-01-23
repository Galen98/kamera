<?php
namespace App\Repositories;

interface ItemRepositoryInterface
{
    public function getAllItem();
    public function createItem(array $data);
    public function getByCat($data);
    public function getById($data);
    public function getAllActiveItem();
    public function lastAvailable($id);
    public function stockAvailable($id);
    public function bookedStock($id);
}