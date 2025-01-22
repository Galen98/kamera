@extends('../app')
@section('content')
<div class="container mt-1">
    <div id="loadingOverlay" class="loading-overlay">
        <div class="spinner"></div>
    </div>
<div class="hero-unit hero-background-1">
    <h1>Detail Item</h1>
</div>

<ul class="breadcrumb">
    <li><a href="/">Home</a> <span class="divider">/</span></li>
    <li><a href="{{ route('index.item') }}">Master Item</a> <span class="divider">/</span></li>
    <li class="active">View Detail Item</li>
</ul>

<div class="view-field" style="margin-bottom:25px;">
    <label class="control-label" for="inputEmail">Kode Item<span style="color: red;">*</span></label>
    <input type="text" readonly name="kode_item" id="kode" value="{!! $item->kode_item !!}">

    <label class="control-label" for="inputEmail">Merk <span style="color: red;">*</span></label>
    <input type="text" class="input-block-level" value="{!! $item->merk !!}" placeholder="Merk" name="merk" id="merk-edit" readonly>
    
    <label class="control-label" for="inputEmail">Nama Item <span style="color: red;">*</span></label>
    <input type="text" class="input-block-level" value="{!! $item->nama_item !!}" placeholder="Nama Item" name="nama_item" id="nama-edit" readonly>

    <label class="control-label" for="inputEmail">Seri <span style="color: red;">*</span></label>
    <input type="text" class="input-block-level" placeholder="Seri" value="{!! $item->seri !!}" name="seri" id="seri-edit" readonly>

    <label class="control-label" for="inputEmail">Stok <span style="color: red;">*</span></label>
    <input type="number" class="input-block-level" id="stok-edit" name="stok" min="0" value="{!! $item->stok !!}" readonly>

    <label class="control-label" for="inputEmail">Spesifikasi <span style="color: red;">*</span></label>
    <textarea class="input-block-level" id="spek-edit" rows="3" name="spesifikasi" readonly>{!! $item->spesifikasi !!}</textarea>

    <label class="control-label" for="inputEmail">Harga Sewa Per Hari <span style="color: red;">*</span></label>
    <div class="input-prepend input-append input-block-level">
      <span class="add-on">Rp.</span>
      <input class="span2" id="appendedPrependedInput-edit" type="text" value="{!! $item->harga_per_hari !!}" name="harga_per_hari" readonly>
    </div>
    <br/>
    
    <span class="button-edits">
    <button class="btn btn-sm btn-primary btn-edit-item" data-id="{!! $item->id !!}" type="button" @if($item->status == 0) disabled @endif>
    <i class="far fa-edit"></i> Edit Item</button>
    </span>
    @if($item->status == 1)
    <button class="btn btn-sm btn-danger btn-status-change" type="button" data-id="{!! $item->id !!}">
    <i class="fa fa-ban" aria-hidden="true"></i> Non-aktifkan item</button>
    @else
    <button class="btn btn-sm btn-success btn-status-change" type="button" data-id="{!! $item->id !!}">
    <i class="fa-solid fa-check"></i> Aktifkan item</button>
    @endif

</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/master-item.js') }}"></script>
@endsection