@extends('../app')
@section('content')
<div class="container mt-1">
    <h2 class="text-black">Master Data Item</h2>
    <a href="{{ route('add.item') }}" class="btn btn-md"><i class="fa-solid fa-plus"></i> add new data</a>
</div>

<div class="container mt-1">
    <div class="row-fluid">
      <div class="span3">
        <div class="well sidebar-nav">
          <ul class="nav nav-list">
            <li class="nav-header">Category:</li>
            <li><a href="/master-item">All</a></li>
            @foreach($category as $item)
            <li><a href="#">{{$item->nama_category}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="span9">
        <div class="row-fluid itemMaster">
        <div class="span4">
            <div class="card">
                <img src="https://framerusercontent.com/images/yY0ZQLYDzpEQkrUF6fFYOlBM6M.png?scale-down-to=1024" alt="Card Image 1">
                <div class="card-header">Canon X-24 Zero</div>
                <div class="card-body">
                    <p>Sisa stok: <b>2</b></p>
                    <p>Keterangan: Camera terbaru</p>
                    <h5>Harga: Rp.100.000 /12 jam</h5>
                    <p><a class="btn" href="#">View details &raquo;</a></p>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="card">
                <img src="https://framerusercontent.com/images/yY0ZQLYDzpEQkrUF6fFYOlBM6M.png?scale-down-to=1024" alt="Card Image 1">
                <div class="card-header">Canon X-24 Zero</div>
                <div class="card-body">
                    <p>Sisa stok: <b>2</b></p>
                    <p>Keterangan: Camera terbaru</p>
                    <h5>Harga: Rp.100.000 /12 jam</h5>
                    <p><a class="btn" href="#">View details &raquo;</a></p>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="card">
                <img src="https://framerusercontent.com/images/yY0ZQLYDzpEQkrUF6fFYOlBM6M.png?scale-down-to=1024" alt="Card Image 1">
                <div class="card-header">Canon X-24 Zero</div>
                <div class="card-body">
                    <p>Sisa stok: <b>2</b></p>
                    <p>Keterangan: Camera terbaru</p>
                    <h5>Harga: Rp.100.000 /12 jam</h5>
                    <p><a class="btn" href="#">View details &raquo;</a></p>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection