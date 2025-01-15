@extends('app')
@section('content')
<!-- <div class="row">
    <div class="col-md-6">
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Login</button>
                <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
            </div>
        </form>
    </div>
</div> -->
<div class="container mt-1">
@if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-error">{{ $err }}</p>
        @endforeach
        @endif
        <center><h2 class="form-signin-heading">
            <img src="{{ asset('LOGO.png') }}" width="80" class="img-rounded">
        </h2>
        <h4 style="color:white;">Aplikasi Persewaan Barang</h4>
    </center>
        <form class="form-signin" style="margin-top:50px;background-color:#151b23; border-width: thin;" action="{{ route('login.action') }}" method="POST">
        @csrf
          <input type="email" name="username" class="input-block-level" placeholder="Email address">
          <input type="password" name="password" class="input-block-level" placeholder="Password">
          <button class="btn btn-sm btn-success" type="submit">Login</button>
        </form>
      </div>
@endsection