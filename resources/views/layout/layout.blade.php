<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'YouConnecte')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .nav-container {
            /* background-color: skyblue; */
            position: fixed;
            margin-top: -50px;
        }


        .site-body {
            background-color: white;
        }

        .site-main {
            background-color: white;
            height: 100vh;
        }

        .main-content {
            height: 100vh;
        }

        .aside {
            height: 100vh;
            /* position: fixed; */
        }

        aside li {
            padding: 10px;
            background-color: #efefef;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: .3s;
            list-style-type: none;
        }

        aside li a {
            text-decoration: none;
            color: black;
        }

        aside li:hover {

            background-color: #999999;
        }

        /* .img-rounded {
            border-radius: 100px;
        } */

        .search-container,
        .posts-container {
            background-color: #efefef;
        }

        /* aside li:hover a {
            color: #747474;
        } */
    </style>
</head>

<body class="site-body">
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand text-light"><h2>YouConnecte</h2></a>
            <form class="d-flex" role="search" action="{{url ('/search')}}" type="get">
                <input class="form-control me-2" type="search" id="myInput" name="search" placeholder="Search by user name" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <div class="d-flex">
                <div class="dropdown me-4">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        More actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Home page</button></li>
                        <li><button class="dropdown-item" type="button">Messages</button></li>
                        <li><a class="dropdown-item" type="button" href="{{route('logout')}}">Log out</a></li>

                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Notifaction
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">notifaction</button></li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
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
                                    <div class="col-8 d-flex align-items-center ">
                                        <h3><a href="{{route('profil')}}"> {{ session('user_name') }}</a></h3>
                                    </div>
                                </div>
                            </a>
                        </li>


                        <li class="">
                            <!-- Button trigger modal -->
                            <button class="h5 text-dark" style="background-color: transparent; border: none;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Earth-Share--Streamline-Ultimate.svg" height="28" width="28">
                                    <g id="Earth-Share--Streamline-Ultimate.svg">
                                        <path d="M24 21.25a2.74 2.74 0 0 0 -4.54 -2.08 0.49 0.49 0 0 1 -0.51 0.08l-2.43 -1a0.92 0.92 0 0 0 0 -0.16 0.49 0.49 0 0 1 0.24 -0.46l2.57 -1.55a0.51 0.51 0 0 1 0.52 0 2.71 2.71 0 0 0 1.43 0.41 2.75 2.75 0 1 0 -2.75 -2.75 0.92 0.92 0 0 0 0 0.16 0.5 0.5 0 0 1 -0.24 0.46l-2.59 1.56a0.51 0.51 0 0 1 -0.52 0 2.71 2.71 0 0 0 -1.43 -0.41 2.75 2.75 0 1 0 1.79 4.83 0.49 0.49 0 0 1 0.51 -0.08l2.43 1a2.75 2.75 0 0 0 5.5 0Z" fill="#000000" stroke-width="1"></path>
                                        <path d="M16.23 21.93a0.54 0.54 0 0 0 -0.43 0 4.18 4.18 0 0 1 -2.05 0.54 4.29 4.29 0 0 1 -1.89 -0.47 0.56 0.56 0 0 0 -0.21 -0.06 10 10 0 0 1 -4 -1 0.24 0.24 0 0 1 -0.14 -0.23v-1.1a2.5 2.5 0 0 1 0.89 -1.91 4.5 4.5 0 0 0 -2.9 -7.95H2.58a0.24 0.24 0 0 1 -0.19 -0.1 0.23 0.23 0 0 1 -0.05 -0.21 10 10 0 0 1 14.55 -6.16 0.25 0.25 0 0 1 0.12 0.28 0.26 0.26 0 0 1 -0.24 0.19h-2.52a2.75 2.75 0 0 0 0 5.5 2.59 2.59 0 0 1 2.22 1.26l0.47 0.77a0.49 0.49 0 0 0 0.41 0.25 0.53 0.53 0 0 0 0.43 -0.22A4.21 4.21 0 0 1 23 9.88a0.49 0.49 0 0 0 0.52 -0.06 0.51 0.51 0 0 0 0.18 -0.5A12 12 0 0 0 0 12c0 4.92 4 12 12 12a11.76 11.76 0 0 0 4.89 -1.06 0.49 0.49 0 0 0 0.28 -0.58 0.16 0.16 0 0 0 -0.06 -0.08Z" fill="#000000" stroke-width="1"></path>
                                    </g>
                                </svg> New Post
                        </li></button>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">New Post</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('share.post') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="form-floating mb-2">
                                                <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                <label for="floatingTextarea">Content</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <!-- <label for="formFile" class="form-label">Image</label> -->
                                                <input class="form-control" name="post_cover" type="file" placeholder="Image" id="formFile">
                                            </div>
                                            <button type="submit" class="btn btn-primary">share</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <li><a href="{{ route('home') }}" class="h5 text-dark"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28" id="House-2--Streamline-Ultimate.svg" height="28" width="28">
                                    <path d="m27.66166666666667 13.171666666666667 -12.833333333333334 -12.833333333333334a1.1666666666666667 1.1666666666666667 0 0 0 -1.6566666666666667 0l-12.833333333333334 12.833333333333334a1.1666666666666667 1.1666666666666667 0 0 0 -0.245 1.271666666666667A1.1666666666666667 1.1666666666666667 0 0 0 1.1666666666666667 15.166666666666668h1.4583333333333335a0.2916666666666667 0.2916666666666667 0 0 1 0.2916666666666667 0.2916666666666667V26.833333333333336a1.1666666666666667 1.1666666666666667 0 0 0 1.1666666666666667 1.1666666666666667h6.708333333333334a0.2916666666666667 0.2916666666666667 0 0 0 0.2916666666666667 -0.2916666666666667V22.166666666666668a2.916666666666667 2.916666666666667 0 0 1 5.833333333333334 0v5.541666666666667a0.2916666666666667 0.2916666666666667 0 0 0 0.2916666666666667 0.2916666666666667h6.708333333333334a1.1666666666666667 1.1666666666666667 0 0 0 1.1666666666666667 -1.1666666666666667v-11.375a0.2916666666666667 0.2916666666666667 0 0 1 0.2916666666666667 -0.2916666666666667H26.833333333333336a1.1666666666666667 1.1666666666666667 0 0 0 1.0733333333333335 -0.7233333333333334 1.1666666666666667 1.1666666666666667 0 0 0 -0.245 -1.271666666666667Z" fill="#000000" stroke-width="1"></path>
                                </svg> Home</a>
                        </li>

                        <li class=""><a href="{{ route('logout') }}" class="h5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Logout-1--Streamline-Ultimate.svg" height="28" width="28">
                                    <g id="Logout-1--Streamline-Ultimate.svg">
                                        <path d="M7 14.5a3 3 0 0 1 -2.94 -3.59A3.06 3.06 0 0 1 7.11 8.5H14a0.5 0.5 0 0 0 0.5 -0.5V1.5a1 1 0 0 0 -1 -1H1a1 1 0 0 0 -1 1v21a1 1 0 0 0 1 1h12.5a1 1 0 0 0 1 -1V15a0.5 0.5 0 0 0 -0.5 -0.5Z" fill="#000000" stroke-width="1"></path>
                                        <path d="m23.62 10.72 -5 -4a1 1 0 0 0 -1.05 -0.12 1 1 0 0 0 -0.57 0.9V10H7a1.5 1.5 0 0 0 0 3h10v2.5a1 1 0 0 0 0.57 0.9 1 1 0 0 0 1.05 -0.12l5 -4a1 1 0 0 0 0 -1.56Z" fill="#000000" stroke-width="1"></path>
                                    </g>
                                </svg> logout</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="container d-flex flex-column align-items-center col-md-6">

                @yield('content')
            </div>
            <div class="col-md-3">
                <aside class="p-4 aside">
                    <ul class="list-group">
                        <li class="">
                            <h3>Friends</h3>
                        </li>
                        <li class="">vvvvvvvvvv</li>
                        <li class="">vvvvvvvvvv</li>
                        <li class="">vvvvvvvvvv</li>
                        <li class="">vvvvvvvvvv</li>
                    </ul>
                </aside>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>