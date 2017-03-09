<!DOCTYPE html>
<html>
<head>
    <title>Soundboard.io</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}" />
</head>
<body>
<div class="container">
    <div class="content">

        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        @endif

        @yield('content')
    </div>
</div>
</body>

<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>

</html>
