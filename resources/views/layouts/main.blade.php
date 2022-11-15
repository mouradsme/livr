<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ Session::token() }}">

    @if(!request()->is('login'))
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}" />

    @handheld
    <link rel="stylesheet" href="{{ asset('css/app-mobile.min.css') }}" />

    @endhandheld
    @endif
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ asset('css/argon/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/argon/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="{{ asset('css/argon/font-awesome.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/argon/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('css/argon/argon-design-system.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @stack('css')

    <title>LIVRI</title>
</head>
<body>
@if(!request()->is('mobile'))
    @include('layouts.header')
<div id="main-container">

    @handheld

        @elsehandheld
        @include('layouts.sidebar')

    @endhandheld
    <div class="main-content">
        @yield('content')

        @if (\Session::has('fail'))
        <div class="alert-container">
            <div class="alert alert-danger">
                {!! \Session::get('fail') !!}
            </div>
        </div>
        @endif
        @if ($errors->any())

        <div class="alert-container">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>

    @include('layouts.footer')
    @else
    @yield('content')

@endif

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
<script src="{{ asset('js/html5-qrcode.min.js') }}"></script>


<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
