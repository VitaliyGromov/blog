<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">
    @stack('css')
    <title>@yield('page.title', config('app.name'))</title>
</head>
<body>
    <div class="d-flex flex-column justify-content-between min-vh-100">
        @include('include.header')
        <main class="flex-grow-1 py-3">
            @yield('content')
        </main>

        @include('include.footer')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js"></script>
    @stack('js')
</body>
</html>