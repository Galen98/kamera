<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <title>@yield('title', $title)</title>
</head>

<body class="{{ request()->is('login') ? 'bg-blck' : '' }}">
@auth
<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand"><img src="{{ asset('LOGO.png') }}" width="30" class="img-rounded"></a>
            <div class="nav-collapse collapse">
              <ul class="nav">
              <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                <li class="{{ request()->is('master-item') ? 'active' : '' }}"><a href="{{ route('index.item') }}">Master Item</a></li>
                <li class="{{ request()->is('transaction') ? 'active' : '' }}"><a href="{{ route('index.transaction') }}">Transaction</a></li>
                <li class="{{ request()->is('report') ? 'active' : '' }}"><a href="{{ route('index.report') }}">Report</a></li>
                <li class="{{ request()->is('setting') ? 'active' : '' }}"><a href="{{ route('index.setting') }}"><i class="fa-solid fa-gear"></i> Setting</a></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
@endauth
    <div class="container">
        @yield('content')
    </div>
    
    @yield('scripts')
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>