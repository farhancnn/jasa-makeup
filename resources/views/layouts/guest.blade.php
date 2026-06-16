<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Elora Beauty')</title>

    {{-- CDN Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/user.css')}}" />
</head>

<body>

    @include('partials.partials_user.navbar')

    @yield('content')

    @include('partials.partials_user.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <script>
        function toggleMenu() {
            document.querySelector('.logoo').classList.toggle('active');
        }
        document.addEventListener("DOMContentLoaded", function() {
    
            let backdrops = document.querySelectorAll('.modal-backdrop, .offcanvas-backdrop');
            backdrops.forEach(el => el.remove());
            
          
            document.body.classList.remove('modal-open');
            document.body.style.overflow = 'auto';
            document.body.style.paddingRight = '0px';
        });
    </script>

</body>


</html>
