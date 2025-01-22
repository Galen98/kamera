<?php
namespace App\Repositories;

interface TransactionRepositoryInterface
{
    public function getAllTransaction();
    public function createTransaction(array $data);
}