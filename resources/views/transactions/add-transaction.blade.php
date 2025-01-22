@extends('../app')
@section('content')
<div class="container mt-1">
<div id="loadingOverlay" class="loading-overlay">
    <div class="spinner"></div>
</div>
<ul class="breadcrumb">
    <li><a href="/">Home</a> <span class="divider">/</span></li>
    <li><a href="{{ route('index.transaction') }}">Transaction</a> <span class="divider">/</span></li>
    <li class="active">Add Transaction</li>
</ul>
<h3>Add New Transaction</h3>
<ul class="nav nav-tabs">
    <li class="active">
      <a href="#" data-field="nav-report" id="nav-report_1">Item List</a>
    </li>
    <li>
      <a href="#" data-field="nav-report" id="nav-report_2">Informasi Detail Sewa</a>
    </li>
</ul>

<div id="item-list">
    <div class="container">
        <div class="row">
            <div class="span8">
            <h3>Daftar Barang</h3>
                <div class="input-append">
                    <input type="text" class="input-medium search-query item-search" placeholder="Cari Barang" onkeyup="filterItems(this.value)">
                  </div>
                <div class="row itemData">
                    
                </div>
            </div>

           
            <div class="span4 mt-1">
                <div class="well">
                    <ul class="unstyled">
                        <li class="clearfix">
                            <span>Item 1 ($20)</span>
                            <input type="number" class="input-mini pull-right" value="2" style="margin-left: 5px; width: 40px;">
                            <button class="btn btn-danger btn-sm pull-right" style="margin-left: 5px;">
                                <i class="fa fa-trash"></i>
                            </button>
                            <span class="pull-right">$20</span>
                        </li>
                        <hr>
                        <li class="clearfix">
                            <span>Item 2 ($10)</span>
                            <input type="number" class="input-mini pull-right" value="1" style="margin-left: 5px; width: 40px;">
                            <button class="btn btn-danger btn-sm pull-right" style="margin-left: 5px;">
                                <i class="fa fa-trash"></i>
                            </button>
                            <span class="pull-right">$10</span>
                        </li>
                    </ul>
                    <hr>
                    <h4>Total: $30</h4>
                    {{-- <button class="btn btn-success btn-block">Checkout</button> --}}
                </div>
            </div>
            
        </div>
    </div>
</div>

<div id="detail-info">

</div>
<hr>

</div>
@endsection

@section('scripts')
<script src="{{ asset('js/transactions.js') }}"></script>
@endsection