<?php
namespace App\Repositories;

interface ItemRepositoryInterface
{
    public function getAllItem();
    public function createItem(array $data);
    public function getByCat($data);
    public function getById($data);
    public function getAllActiveItem();
}