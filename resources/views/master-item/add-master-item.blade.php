@extends('../app')
@section('content')
<div class="container mt-1">
<div id="loadingOverlay" class="loading-overlay">
    <div class="spinner"></div>
</div>
<div class="hero-unit hero-background-2">
    <h1>Add New Item</h1>
  </div>
    <ul class="breadcrumb">
        <li><a href="{{ route('index.item') }}">Master Item</a> <span class="divider">/</span></li>
        <li class="active">Add Item</li>
      </ul>

      <form>
        <label class="control-label" for="inputEmail">Kode Item<span style="color: red;">*</span></label>
        <input type="text" readonly>
        <label class="control-label" for="inputEmail">Nama Item <span style="color: red;">*</span></label>
        <input type="text" class="input-block-level" placeholder="Nama Item">
        <label class="control-label" for="inputEmail">Spesifikasi <span style="color: red;">*</span></label>
        <textarea class="input-block-level" rows="3"></textarea>
        <label class="control-label" for="inputEmail">Harga Sewa Per Hari <span style="color: red;">*</span></label>
        <div class="input-prepend input-append input-block-level">
          <span class="add-on">Rp.</span>
          <input class="span2" id="appendedPrependedInput" type="text">
        </div>
        <label class="control-label" for="inputEmail">Harga Sewa Per Jam</label>
        <div class="input-prepend input-append input-block-level">
          <span class="add-on">Rp.</span>
          <input class="span2" id="appendedPrependedInput" type="text">
        </div>
        <label class="control-label" for="inputEmail">Category <span style="color: red;">*</span></label>
        <button type="button" class="btn btn-sm" id="openModal"><i class="fa-solid fa-plus"></i> add category</button><br/><br/>

        <select id="categoryList">

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