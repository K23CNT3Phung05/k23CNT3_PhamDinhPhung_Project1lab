
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
        /* Sidebar styles */
        .sideBar{
            width: 250px;
            background: #343a40;
            min-height: 100vh;
            padding-top: 20px;
        }

        /* Main content wrapper styles */
        .wrapper{
            width: calc(100% - 250px);
            background: #fff;
            min-height: 100vh;
        }

        /* Custom spacing */
        .content-body {
            padding: 20px;
        }

        /* Ensure sidebar links are styled well */
        .sideBar a {
            color: black;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        .sideBar a:hover {
            color: white;
            background-color: #575757;
      
        }

        /* Header title styles */
        header {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 1.5em;
        }
    </style>
</head>
<body style="background: #f4f4f4;">
    <section class="container-fluid d-flex">
        <!-- Sidebar -->
        <nav class="sideBar m-1">
            @include('_layouts.admins._menu')
        </nav>

        <!-- Main content wrapper -->
        <section class="wrapper m-1 p-1">
            <header class="my-1">
                @include('_layouts.admins._headerTitle')
            </header>

            <!-- Content body -->
            <section class="content-body m-1 p-1">
                @yield('content-body')
            </section>
        </section>
    </section>

    <!-- Script dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
