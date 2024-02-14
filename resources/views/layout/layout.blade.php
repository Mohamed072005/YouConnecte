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

        .aside {
            height: 100vh;
        }

        aside li {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: .3s;
            list-style-type: none;
        }

        aside li a{
            text-decoration: none;
            color: white;
        }

        aside li:hover {

            background-color: #747474;
        }

        /* .img-rounded {
            border-radius: 100px;
        } */

        .search-container {
            background-color: #747474;
        }

        /* aside li:hover a {
            color: #747474;
        } */
    </style>
</head>

<body class="site-body">
    <header class="p-2">
        <div class="container d-flex justify-content-between align-items-center nav-container">
            <div class="">
                <a href="" class="navbar-brand">
                    <h2 class="text-light">@yield('title', 'YouConnecte')</h2>
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
                    <ul class="list-group">
                        <li class="text-light">
                            <a href="">
                                <div class="d-flex row rounded">
                                    <div class="col-4 d-flex align-items-center justify-content-start p-2">
                                        <img src="{{ asset('storage/image.png') }}" style="width: 70px; height: 70px;" class="rounded-circle img-fluid" alt="user_img">
                                    </div>
                                    <div class="col-8 d-flex align-items-center">
                                        <h3>{{ session('user_name') }}</h3>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        <li class="text-light">vvvvvvvvvv</li>
                        <li class="text-light">vvvvvvvvvv</li>
                        <li class="text-light">vvvvvvvvvv</li>
                        <li class="text-ligh"><a href="{{ route('to.logout') }}" class="h5 text-light"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Logout-1--Streamline-Ultimate.svg" height="28" width="28"><g id="Logout-1--Streamline-Ultimate.svg"><path d="M7 14.5a3 3 0 0 1 -2.94 -3.59A3.06 3.06 0 0 1 7.11 8.5H14a0.5 0.5 0 0 0 0.5 -0.5V1.5a1 1 0 0 0 -1 -1H1a1 1 0 0 0 -1 1v21a1 1 0 0 0 1 1h12.5a1 1 0 0 0 1 -1V15a0.5 0.5 0 0 0 -0.5 -0.5Z" fill="#ffffff" stroke-width="1"></path><path d="m23.62 10.72 -5 -4a1 1 0 0 0 -1.05 -0.12 1 1 0 0 0 -0.57 0.9V10H7a1.5 1.5 0 0 0 0 3h10v2.5a1 1 0 0 0 0.57 0.9 1 1 0 0 0 1.05 -0.12l5 -4a1 1 0 0 0 0 -1.56Z" fill="#ffffff" stroke-width="1"></path></g></svg>logout</a></li>
                    </ul>
                </aside>
            </div>
            <div class="container col-md-6">
                <div class="search-container d-flex justify-content-center mt-3 w-75 row rounded">
                    <div class="col-md-3 d-flex align-items-center justify-content-center p-2">
                        <img src="{{ asset('storage/image.png') }}" style="width: 70px; height: 70px;" class="rounded-circle img-fluid" alt="user_img">
                    </div>
                    <div class="col-md-9 d-flex align-items-center">
                        <form class="search-form w-100 d-flex justify-content-center" role="search">
                            <input class="search-input form-control rounded-pill me-2 w-100 " type="search" placeholder="What's in your mind Banta?" id="searchinput">
                            <!-- <button class="btn btn-outline-warning">Search</button> -->
                        </form>
                    </div>
                </div>
                @yield('content')
            </div>
            <div class="col-md-3">
                <aside class="p-4 aside">
                    <ul class="list-group">
                        <li class="text-light">
                            <h3>{{ session('user_name') }}</h3>
                        </li>
                        <li class="text-light">vvvvvvvvvv</li>
                        <li class="text-light">vvvvvvvvvv</li>
                        <li class="text-light">vvvvvvvvvv</li>
                        <li class="text-light">vvvvvvvvvv</li>
                    </ul>
                </aside>
            </div>
        </div>

    </main>


</body>

</html>