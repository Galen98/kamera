@extends('../app')
@section('content')
<div class="container mt-1">
    <div id="loadingOverlay" class="loading-overlay">
        <div class="spinner"></div>
    </div>
<ul class="breadcrumb">
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li class="active">Setting</li>
</ul>
<div class="data-sukses">

</div>
<div>
    <h4>Email</h4>
    <input type="email" value="{{ $data ?? '' }}" class="input-block-level email-input email" readonly placeholder="Email" name="email" id="email">

    <span style="color: red;">*Untuk keperluan notifikasi via email.</span>
    <br>
    <div class="btn-on-edit">
    <button class="btn btn-sm btn-primary btn-edit" type="button" style="margin-top:10px;"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
    </div>
</div>

<div style="margin-top: 25px;margin-bottom:25px;">
    <h4>Custom Invoice</h4>
    <button class="btn" id="openModal">Add new Invoice</button>
</div>

{{-- <div class="span9">
    <div class="row-fluid">
        <div class="span4">
            <div class="well">
                <h5>Judul Card</h5>
                <a href="#" class="btn btn-info">Edit</a>
            </div>
        </div>
    </div>
</div> --}}
<div class="row itemInvoice">
    
</div>

<div class="modal-overlay" id="modalOverlay">
    <div class="modal-container">
      <div class="modal-header">
        <strong>Add Invoice</strong>
      </div>
      <div class="modal-body">
      <label class="control-label" for="store">Nama Store</label>
      <input type="text" name="store_name" id="store" placeholder="Masukan nama store">
      <div class="control-group">
      <label class="control-label" for="logo">Logo</label>
      <div class="controls">
        <input type="file" id="fileInput" accept="image/png, image/jpg, image/jpeg" name="logo">
    </div>
      </div>
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" id="store-invoice">Submit</button>
        <button class="btn" id="closeModal">Close</button>
      </div>
    </div>
</div>

<div class="modal-overlay" id="modalOverlayEdit">
    <div class="modal-container">
      <div class="modal-header">
        <strong>Edit Invoice</strong>
      </div>
      <div class="modal-body">
      <label class="control-label" for="store-edit">Nama Store</label>
      <input type="text" name="store_name" id="store-edit" placeholder="Masukan nama store">
      <div class="control-group">
      <label class="control-label" for="logo">Logo</label>
      <div class="controls">
        <input type="file" id="fileInput-edit" accept="image/png, image/jpg, image/jpeg" name="logo">
    </div>
      </div>
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" id="update-invoice">Update</button>
        <button class="btn" id="closeModalEdit">Close</button>
      </div>
    </div>
</div>

<div class="modal-overlay" id="modalOverlayDelete">
    <div class="modal-container">
      <div class="modal-header">
        <strong>Delete Invoice</strong>
      </div>
      <div class="modal-body">
      <label class="control-label" for="store-delete">Apakah anda yakin?</label>
      <input type="hidden" id="store-delete" placeholder="Masukan nama store">
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" id="delete-invoice">Confirm</button>
        <button class="btn" id="closeModalDelete">Close</button>
      </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/setting.js') }}"></script>
@endsection