@extends('../app')
@section('content')
<div class="container mt-1">
<ul class="breadcrumb">
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li class="active">Setting</li>
</ul>

<form action="">
    <h4>Email</h4>
    <input type="text" class="input-block-level" readonly placeholder="Email" name="email" id="email">
    <span style="color: red;">*Untuk keperluan notifikasi</span>
    <br>
    <button class="btn btn-sm btn-primary" type="button" style="margin-top:10px;">Edit</button>
</form>

<div style="margin-top: 25px;">
    <h4>Custom Invoice</h4>
    <button class="btn">Add new Invoice</button>
</div>
</div>
@endsection