@extends('app')
@section('content')
<div class="container mt-1">
<!-- <div id="loadingOverlay" class="loading-overlay">
    <div class="spinner"></div>
</div> -->
<div class="hero-unit hero-background-3">
    <h1>Home</h1>
  </div>
  <div class="alert alert-block">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4><i class="fa-solid fa-bell"></i> Notification</h4>
  <ul>
    <li>s</li>
  </ul>
</div>

<h3>Customer Hari Ini</h3>
<table class="table table-striped">
    <thead>
      <tr style="background-color:#151b23;color:white;">
        <th>No.Order</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Total</th>
        <th>Status Pembayaran</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>John</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endsection