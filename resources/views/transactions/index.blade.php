@extends('../app')
@section('content')
<div class="container mt-1">
<ul class="breadcrumb">
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li class="active">Transaction</li>
</ul>

<h2 class="text-black">Transaction</h2>
    <a href="{{ route('add.transaction') }}" class="btn btn-md"><i class="fa-solid fa-plus"></i> add new transaction</a>

<h6>Filter No.Order:</h6>
<form class="form-search" style="margin-top: 15px;">
  <div class="input-append">
    <input type="text" class="input-medium search-query" placeholder="Cari Nomor Order">
    <button type="submit" class="btn">
    <i class="fas fa-search"></i>
    </button>
  </div>
</form>
  <h6>Filter Range Tanggal:</h6>
<form class="form-search" style="margin-top: 15px;">
  <div class="input-append">
    <input type="date" style="margin-right: 10px;">
    <input type="date">
    <button type="submit" class="btn">
    <i class="fas fa-search"></i>
    </button>
  </div>
</form>

<table class="table table-striped table-bordered">
    <thead>
      <tr style="background-color:#151b23;color:white;">
        <th style="width: 50px;">No.</th>
        <th>No.Order</th>
        <th>Nama</th>
        <th>Tanggal Sewa</th>
        <th>Total</th>
        <th>Status Pembayaran</th>
        <th>Status Sewa</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1.</td>
      <td>John</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td><span class="label label-important">Belum Lunas</span></td>
        <td><span class="label label-important">Disewa</span></td>
        <td><button class="btn btn-sm">Details &raquo;</button></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection