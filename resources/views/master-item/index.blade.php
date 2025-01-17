@extends('../app')
@section('content')
<div id="loadingOverlay" class="loading-overlay">
    <div class="spinner"></div>
</div>
<div class="container mt-1">
<ul class="breadcrumb">
    <li><a href="/">Home</a> <span class="divider">/</span></li>
    <li class="active">Master Item</li>
</ul>
    <h2 class="text-black">Master Data Item</h2>
    <a href="{{ route('add.item') }}" class="btn btn-md"><i class="fa-solid fa-plus"></i> add new data</a>
</div>

@if(session('success'))
<div class="alert alert-block alert-success" style="margin-top: 10px;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p><i class="fa-solid fa-check"></i> {{ session('success') }}</p>
</div>
@endif

<div class="container mt-1">
    <div class="row-fluid">
      <div class="span3">
        <div class="well sidebar-nav">
          <ul class="nav nav-list">
            <li class="nav-header">Category:</li>
            <li><a href="#" id="allItems">All</a></li>
            @foreach($category as $item)
            <li><a href="#" class="text-capitalize" id="filter-cat_{{ $loop->index }}" data-id="{{$item->id}}" data-field='filter-cat'>{{$item->nama_category}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="span9">
        <div class="row-fluid itemMaster">
        
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/master-item.js') }}"></script>
@endsection