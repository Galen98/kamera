<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index() {
        $data['title'] = 'Transaction';
        return view('transactions/index', $data);
    }

    public function add() {
        $data['no_invoice'] = Transaction::generateCode();
        $data['title'] = 'Add New Transaction';
        return view('transactions/add-transaction', $data);
    }
}
