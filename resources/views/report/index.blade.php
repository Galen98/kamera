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
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/report.js') }}"></script>
@endsection