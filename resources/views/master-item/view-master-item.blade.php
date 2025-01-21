@extends('../app')
@section('content')
<div class="container mt-1">
    {{-- <div id="loadingOverlay" class="loading-overlay">
        <div class="spinner"></div>
    </div> --}}
    <div class="hero-unit hero-background-1">
        <h1>Details Item</h1>
    </div>

<ul class="breadcrumb">
    <li><a href="/">Home</a> <span class="divider">/</span></li>
    <li><a href="{{ route('index.item') }}">Master Item</a> <span class="divider">/</span></li>
    <li class="active">View Item</li>
</ul>
</div>
@endsection