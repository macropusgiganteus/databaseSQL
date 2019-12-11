<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content=" {{csrf_token()}} ">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
          <a href="/">All Product</a>
        </li>
        <li class="dropdown"> 
          <p class="dropbtn">Manage</p>
          <div class="dropdown-content">
            <a href="/employees" >Employee</a>
            <a href="/customers" >Customer</a>
            <a href="/orders" >Order</a>
            <a href="/payments/index">Payments</a>
          </div>
        </li> 
        <li>
          <a href="/checklist"><span class="fas fa-cart-plus"></span></a>
        </li>    
        <li>
          <a href="/login">Log in</a>
        </li>
      </ul>
    </nav> 
  </header>

@yield('content')


</body>

</html>