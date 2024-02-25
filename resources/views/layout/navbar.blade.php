<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<nav class="navbar bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-light fw-bold">YouConnecte</a>
    <form class="d-flex" role="search" action ="{{url ('/search')}}" type="get">
      <input class="form-control me-2" type="search" id="myInput" name="search"placeholder="Search by user name" aria-label="Search">
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
    
</body>
</html>

<style>

</style>