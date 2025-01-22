<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        $data['title'] = 'Report';
        return view('report/index', $data);
    }

    public function send_notification() {

    }

    public function monthly_report() {
        
    }
}
