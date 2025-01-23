@extends('../app')
@section('content')
<div class="container mt-1">
<ul class="breadcrumb">
    <li><a href="/">Home</a> <span class="divider">/</span></li>
    <li><a href="/report">Report</a> <span class="divider">/</span></li>
    <li class="active">Report Barang</li>
</ul>
<h2 class="text-capitalize">Report {!! $dataitem->nama_item !!}</h2>
<h5 style="color: red;">Stock Item: {!! $dataitem->stok !!} item</h5>
<h5>Stock on hand: {{$stokonhand}} item</h5>
<h5>Jumlah disewa: {{$disewa}} item</h5>

<hr>
<h6>Filter Range Tanggal:</h6>
<form class="form-search" style="margin-top: 15px;" method="GET" action="{{ route('itemview.report', $dataitem->id) }}">
  <div class="input-append">
    <input type="date" style="margin-right: 10px;" name="startdate">
    <input type="date" name="enddate">
    <button type="submit" class="btn">
    <i class="fas fa-search"></i>
    </button>
  </div>
</form>
<table class="table table-striped table-bordered" style="margin-top:20px;">
    <thead>
      <tr style="background-color:#151b23;color:white;">
        <th style="width: 50px;">No</th>
        <th>Kode Item</th>
        <th>Tanggal</th>
        <th>Quantity</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($items as $item)
      <tr>
        <td>{{$loop->iteration}}.</td>
        <td>{{$item->item->kode_item}}</td>
        <td class="text-capitalize">{{$item->date_change}}</td>
        <td style="font-weight:bold;">{{$item->qty}} item</td>
        <td>
            @if($item->status == 1)
            <span class="label label-important"><i class="fa-solid fa-chevron-down"></i> Pengurangan Stok</span>
            @elseif($item->status == 2)
            <span class="label label-success"><i class="fa-solid fa-chevron-up"></i> Penambahan Stok</span>
            @elseif($item->status == 3)
            <span class="label label-important"><i class="fa-solid fa-chevron-down"></i> Disewa</span>
            @else
            <span class="label label-success"><i class="fa-solid fa-chevron-up"></i> Dikembalikan</span>
            @endif
        </td>
      </tr>
      @empty
        <tr>
        <td colspan="5" class="text-center">No items found</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  {{ $items->links() }}
</div>
@endsection