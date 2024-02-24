<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('layout.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('layout.navbar')
            <!-- partial -->

            <div class="page-content">

                @yield('content')

            </div>

            <!-- partial:partials/_footer.html -->
            @include('layout.footer')
            <!-- partial -->

        </div>
    </div>


    @include('layout.script')
</body>

</html>
