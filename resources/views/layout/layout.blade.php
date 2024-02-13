<!DOCTYPE html>
<html>

<head>
    <title>YouConnecte</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .nav-container,
        .site-body {
            background-color: #747474;
        }

        .site-main {
            background-color: #434242;
        }

        .main-content {
            height: 100vh;
        }
    </style>
</head>

<body class="site-body">
    <header class="p-2">
        <div class="container d-flex justify-content-between align-items-center nav-container">
            <div class="">
                <a href="" class="navbar-brand">
                    <h2 class="text-light">YouConnecte</h2>
                </a>
            </div>
            <div class="">
                <a href="" class="navbar-brand"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="28" width="28">
                        <path d="M12 0.83C5.38 0.83 0 5.75 0 11.8a10.28 10.28 0 0 0 2.49 6.7 0.29 0.29 0 0 1 0.07 0.18v2.72a1.76 1.76 0 0 0 0.84 1.51 1.72 1.72 0 0 0 0.93 0.26 1.82 1.82 0 0 0 0.79 -0.17l2.07 -1a0.28 0.28 0 0 1 0.22 0 12.87 12.87 0 0 0 4.59 0.84c6.62 0 12 -4.92 12 -11S18.62 0.83 12 0.83Zm6 8.42 -3.46 5.54a1 1 0 0 1 -1.38 0.32l-2.63 -1.65a1 1 0 0 0 -1 0l-2.91 1.71A0.53 0.53 0 0 1 6 15.1a0.5 0.5 0 0 1 -0.08 -0.61L9 9.05a1 1 0 0 1 0.62 -0.48 1 1 0 0 1 0.78 0.12l2.6 1.64a1 1 0 0 0 1 0l3.32 -1.81a0.49 0.49 0 0 1 0.6 0.1 0.48 0.48 0 0 1 0.08 0.63Z" fill="#ffffff" stroke-width="1"></path>
                    </svg></a>
            </div>
        </div>

    </header>
    <main class="site-main">
        <div class="row main-content">
            <div class="col-md-3">
                <aside class="p-4 aside">
                    <ul>
                        <li>vvvvvvvvvv</li>
                        <li>vvvvvvvvvv</li>
                        <li>vvvvvvvvvv</li>
                        <li>vvvvvvvvvv</li>
                        <li>vvvvvvvvvv</li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-6">
                @yield('content')
                <ul>
                    <li>vvvvvvvvvvvv</li>
                    <li>vvvvvvvvvvvv</li>
                    <li>vvvvvvvvvvvv</li>
                    <li>vvvvvvvvvvvv</li>
                </ul>
            </div>
            <div class="col-md-3">
                <aside class="p-4 aside">
                    <ul>
                        <li>vvvvvvvvvv</li>
                        <li>vvvvvvvvvv</li>
                        <li>vvvvvvvvvv</li>
                        <li>vvvvvvvvvv</li>
                        <li>vvvvvvvvvv</li>
                    </ul>
                </aside>
            </div>
        </div>

    </main>


</body>

</html>