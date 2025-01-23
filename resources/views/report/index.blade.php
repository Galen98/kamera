@extends('../app')
@section('content')
<div class="container mt-1">
    {{-- <div id="loadingOverlay" class="loading-overlay">
        <div class="spinner"></div>
    </div> --}}
<ul class="breadcrumb">
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li class="active">Report</li>
</ul>
<ul class="nav nav-tabs">
    <li class="active">
      <a href="#" data-field="nav-report" id="nav-report_1">Report Penjualan</a>
    </li>
    <li><a href="#" data-field="nav-report" id="nav-report_2">Report Barang</a></li>
</ul>
</div>

<div class="nav-penjualan">
<h2>Report Penjualan</h2>
</div>

<div class="nav-barang" style="display: none;">
  <h2>Report Barang</h2>
  
  <table class="table table-striped table-bordered" style="margin-top:20px;">
    <thead>
      <tr style="background-color:#151b23;color:white;">
        <th>Kode Item</th>
        <th>Nama Item</th>
        <th>Merk</th>
        <th>Stok on hand</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($item_report as $item)
      <tr>
      <td>{{$item->kode_item}}</td>
        <td class="text-capitalize">{{$item->nama_item}}</td>
        <td class="text-capitalize">{{$item->merk}}</td>
        <td style="font-weight:bold;">{{$item->availability->count}} item</td>
        <td><a href="{{ route('itemview.report', ['id' => $item->id]) }}" class="btn btn-sm">Details &raquo;</a></td>
      </tr>
      @empty
        <tr>
        <td colspan="5" class="text-center">No items found</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  {{ $item_report->links() }}
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/report.js') }}"></script>
@endsection