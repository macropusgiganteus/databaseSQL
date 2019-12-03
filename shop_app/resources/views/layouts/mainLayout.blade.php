<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="/css/style.css">
  <title>SHOP</title>
</head>

<body>
  <header>
    <h2><a href="/"><i class="fas fa-code"></i>
        SHOP</a></h2>
    <nav>
      <ul>
        <li>
          <a href="/">All Product</a>
        </li>
        <li class="dropdown"> 
          <p class="dropbtn">Manage</p>
          <div class="dropdown-content">
            <a href="/employees">Employee</a>
            <a href="/customers">Customer</a>
            <a href="/stock/index">Stock In</a>
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