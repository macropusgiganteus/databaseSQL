<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content=" {{csrf_token()}} ">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous">


  <link rel="stylesheet" href="/css/style.css">
  <title>@yield('title')</title>
</head>

<body>

  <header class="inner">
    <h2><a href="/"><i class="fas fa-code"></i>
        SHOP</a></h2>
    <nav>
      <ul>
        <li>
          <a href="/main">Home</a>
        </li>
        <li>
          <a href="/products">All Product</a>
        </li>
        <li class="dropdown"> 
          <h4 class="dropbtn">Manage</h4>
          <div class="dropdown-content">
            <a href="/employees">Employee</a>
            <a href="/customers">Customer</a>
          </div>
        </li> 
        <li>
          <a href="/payments"><span class="fas fa-cart-plus"></span></a>
        </li> 
        <li>
          <a href="/">Log out</a>
        </li>

      </ul>
    </nav>
  </header>

@yield('content')


</body>

</html>