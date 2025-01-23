<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemAuditrail;
use App\Repositories\ItemRepositoryInterface;

class ReportController extends Controller
{
    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index() {
        $data['title'] = 'Report';
        $data['item_report'] = Item::with('availability')->paginate(15);
        return view('report/index', $data);
    }

    public function view_report_item(Request $request, $id){
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        $item = Item::find($id);
        $data['title'] = 'Report - '. $item->nama_item .'';
        $itemAuditrailQuery = ItemAuditrail::where('item_masters_id', $id)->with('item');
        if ($startdate && $enddate) {
            $itemAuditrailQuery->whereBetween('date_change', [$startdate, $enddate]);
        } elseif ($startdate) {
            $itemAuditrailQuery->where('date_change', '>=', $startdate);
        } elseif ($enddate) {
            $itemAuditrailQuery->where('date_change', '<=', $enddate);
        }
        $data['items'] = $itemAuditrailQuery->paginate(15);
        $data['dataitem'] = Item::find($id);
        $data['stokonhand'] = $this->itemRepository->stockAvailable($id);
        $data['disewa'] = $this->itemRepository->lastAvailable($id);
        return view('report/barang-view', $data);
    }

    public function send_notification() {

    }

    public function monthly_report() {

    }
}
