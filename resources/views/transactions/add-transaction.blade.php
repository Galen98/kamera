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
<label class="control-label" for="inputEmail">Nomor Invoice<span style="color: red;">*</span></label>
<input type="text" readonly name="no_invoice" id="no_invoice" value="{{$no_invoice}}">
<ul class="nav nav-tabs" style="margin-top:15px;">
    <li class="active">
      <a href="#" data-field="nav-transaction" id="nav-transaction_1">Item List</a>
    </li>
    <li>
      <a href="#" data-field="nav-transaction" id="nav-transaction_2">Informasi Detail Sewa</a>
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
                    <ul class="unstyled item-in-cart">
                        
                    </ul>
                    <hr>
                    <h4>Total: <span class="grand-total"></span></h4>
                    {{-- <button class="btn btn-success btn-block">Checkout</button> --}}
                </div>
            </div>
            
        </div>
    </div>
</div>

<div id="detail-info" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="span8">
                <h3>Detail Informasi</h3>
                <div class="input-append">
                    <label class="control-label" for="inputEmail">Nama Customer<span style="color: red;">*</span></label>
                    <input type="text" name="customer_name" id="customer_name" required>
                    <label class="control-label" style="margin-top: 10px;" for="inputEmail">No WhatsApps<span style="color: red;">*</span></label>
                    <input type="text" name="no_wa" id="no_wa" required>
                    <label class="control-label" style="margin-top: 10px;" for="inputEmail">Notes</label>
                    <textarea name="" id="" cols="10" rows="10"></textarea>
                </div>
            </div>

            <div class="span4 mt-1">
                <div class="well">
                    <ul class="unstyled">
                    <label class="control-label" for="inputEmail">Dibayarkan<span style="color: red;">*</span></label>
                    <input type="text" name="dibayar" id="dibayar">
                    <label class="control-label" for="inputEmail">Tanggal Sewa<span style="color: red;">*</span></label>
                    <input type="date" name="tgl_sewa" id="tgl_sewa">
                    <label class="control-label" for="inputEmail">Hari Sewa<span style="color: red;">*</span></label>
                    <input type="number" min="1" name="hari_sewa" id="hari_sewa">
                    <label class="control-label" for="inputEmail">Tanggal Kembali<span style="color: red;">*</span></label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" disabled>
                    <input type="hidden" name="total_amount" id="total_amount">
                    </ul>
                    <hr>
                    <h4>Total: <span class="grand-total"></span></h4>
                    <button class="btn btn-success btn-block">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/transactions.js') }}"></script>
@endsection