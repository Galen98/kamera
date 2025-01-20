@extends('../app')
@section('content')
<div class="container mt-1">
<ul class="breadcrumb">
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li class="active">Setting</li>
</ul>

<div>
    <h4>Email</h4>
    <input type="text" class="input-block-level email-input" readonly placeholder="Email" name="email" id="email">
    <span style="color: red;">*Untuk keperluan notifikasi via email.</span>
    <br>
    <div class="btn-on-edit">
    <button class="btn btn-sm btn-primary btn-edit" type="button" style="margin-top:10px;"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
    </div>
</div>

<div style="margin-top: 25px;">
    <h4>Custom Invoice</h4>
    <button class="btn">Add new Invoice</button>
</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/setting.js') }}"></script>
@endsection