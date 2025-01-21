@extends('../app')
@section('content')
<div class="container mt-1">
<div id="loadingOverlay" class="loading-overlay">
    <div class="spinner"></div>
</div>
<div class="hero-unit hero-background-2">
    <h1>Add New Item</h1>
</div>
  @if ($errors->any())
<div class="alert alert-block alert-error">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4><i class="fas fa-exclamation-triangle"></i> Error</h4>
  <br/>
  <ul>
  @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
  @endforeach
  </ul>
  </div>
  @endif
<ul class="breadcrumb">
        <li><a href="/">Home</a> <span class="divider">/</span></li>
        <li><a href="{{ route('index.item') }}">Master Item</a> <span class="divider">/</span></li>
        <li class="active">Add Item</li>
</ul>

      <form action="{{ route('store.item') }}" method="POST">
    @csrf
        <label class="control-label" for="inputEmail">Kode Item<span style="color: red;">*</span></label>
        <input type="text" readonly name="kode_item" id="kode">

        <label class="control-label" for="inputEmail">Merk <span style="color: red;">*</span></label>
        <input type="text" class="input-block-level" placeholder="Merk" name="merk" id="merk">
        
        <label class="control-label" for="inputEmail">Nama Item <span style="color: red;">*</span></label>
        <input type="text" class="input-block-level" placeholder="Nama Item" name="nama_item" id="nama">

        <label class="control-label" for="inputEmail">Seri <span style="color: red;">*</span></label>
        <input type="text" class="input-block-level" placeholder="Seri" name="seri" id="seri">

        <label class="control-label" for="inputEmail">Stok <span style="color: red;">*</span></label>
        <input type="number" class="input-block-level" name="stok">

        <label class="control-label" for="inputEmail">Spesifikasi <span style="color: red;">*</span></label>
        <textarea class="input-block-level" rows="3" name="spesifikasi"></textarea>

        <label class="control-label" for="inputEmail">Harga Sewa Per Hari <span style="color: red;">*</span></label>
        <div class="input-prepend input-append input-block-level">
          <span class="add-on">Rp.</span>
          <input class="span2" id="appendedPrependedInput" type="text" name="harga_per_hari">
        </div>

        <label class="control-label" for="inputEmail">Category <span style="color: red;">*</span></label>
        <button type="button" class="btn btn-sm" id="openModal"><i class="fa-solid fa-plus"></i> add category</button><br/><br/>

        <select id="categoryList" name="category_id">

        </select>
        <br/>
        <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-check"></i> Submit</button>
      </form>

<div class="modal-overlay" id="modalOverlay">
      <div class="modal-container">
        <div class="modal-header">
          <strong>Add Category</strong>
        </div>
        <div class="modal-body">
        <label class="control-label" for="kategori">Nama Kategori</label>
        <input type="text" name="kategori" id="kategori" placeholder="Masukan nama kategori">
        </div>
        <div class="modal-footer">
        <button class="btn btn-primary" id="store-category">Submit</button>
          <button class="btn" id="closeModal">Close</button>
        </div>
      </div>
</div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/master-item.js') }}"></script>
@endsection