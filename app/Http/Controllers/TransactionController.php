<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index() {
        $data['title'] = 'Transaction';
        return view('transactions/index', $data);
    }

    public function add() {
        $data['title'] = 'Add New Transaction';
        return view('transactions/add-transaction', $data);
    }
}
