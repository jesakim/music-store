<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <title>Music Store</title>
</head>
<body>
<div style="background-color: #3A5A40;" class="navbar">
  <div class="container-fluid">
    <a style="color: #D6FFB7;" class="navbar-brand" href="#">Music Store</a>
    <div class="d-flex">
    <div class="dropdown text-end mt-1 me-3 align-items-center">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/icon.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" style="color: #3A5A40;background-color: #D6FFB7;">
            <li><a class="dropdown-item" href="#">New Product</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
    <button class="navbar-toggler text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
    <div class="offcanvas offcanvas-start text-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 style="color: #3A5A40;" class="offcanvas-title" id="offcanvasDarkNavbarLabel">Music Store</h5>
        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a style="color: #3A5A40;" class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a style="color: #3A5A40;" class="nav-link" href="#">Dachboard</a>
          </li>
          <li class="nav-item dropdown">
            <a style="color: #3A5A40;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Products
            </a>
            <ul style="color: #3A5A40;background-color: #D6FFB7;" class="dropdown-menu dropdown-menu">
              <li><a class="dropdown-item" href="#">Add Product</a></li>
              <li><a class="dropdown-item" href="#">Check Stock</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button style="color: #D6FFB7;background-color: #3A5A40;box-shadow:none" class="btn" type="submit">Search</button>
        </form>
      </div>
    </div>
    
  </div>
</div>
<div style="background-color:#D6FFB7;color: #3A5A40;" class="text-dark p-3 d-flex justify-content-between align-items-center">
<div class="fs-5">DashBoard</div>
<div style="font-family: Orbitron;" id="MyClockDisplay" class="clock fs-6"></div>
</div>
<div class="row align-items-center w-100">
<div class="card col-12 col-md-6 p-0 mb-2">

<div class="card-body">
  <h5 class="card-title">Sales <span>| Today</span></h5>

  <div class="d-flex align-items-center">
    <div style="background-color: #E1AA7D;height: 80px;width: 80px;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
    <i class="fa-solid fa-cart-shopping text-white fs-3"></i>
    </div>
    <div class="ps-3">
      <h3>145</h3>
      <span class="text-success pt-1 fs-6">12%</span><span class="text-muted small pt-2 ps-1">increase</span>

    </div>
  </div>
</div>
</div>

<div class="card col-12 col-md-6 p-0 mb-2">

<div class="card-body">
  <h5 class="card-title">Products</h5>

  <div class="d-flex align-items-center">
    <div style="background-color: #E1AA7D;height: 80px;width: 80px;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
    <i class="fa-solid fa-boxes-stacked text-white fs-3"></i>
    </div>
    <div class="ps-4">
      <h3>145</h3>
    </div>
  </div>
</div>
</div>
<div class="card col-12 col-md-6 p-0">

<div class="card-body">
  <h5 class="card-title">RasLmale</h5>

  <div class="d-flex align-items-center">
    <div style="background-color: #E1AA7D;height: 80px;width: 80px;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
    <i class="fa-solid fa-coins text-white fs-3"></i>
    </div>
    <div class="ps-4">
      <h3>145</h3>
      <span class="text-success pt-1 fs-6">12%</span><span class="text-muted small pt-2 ps-1">increase</span>
    </div>
  </div>
</div>
</div>
<div class="card col-12 col-md-6 p-0">

<div class="card-body">
  <h5 class="card-title">Check Stock</h5>

  <div class="d-flex align-items-center">
    <div style="background-color: #E1AA7D;height: 80px;width: 80px;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
    <i class="fa-solid fa-arrow-trend-down text-white fs-3"></i>
    </div>
    <div class="ps-4">
      <h3>145</h3>
    </div>
  </div>
</div>
</div>
</div>
<div style="background-color:#D6FFB7;" class="p-3 fs-5 d-flex justify-content-between align-items-center">
<div>Products</div>
<button style="background-color:#3A5A40;border:none;" type="button" class="rounded-pill p-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <span class="p-3 text-white"><i class="fa-solid fa-plus me-2 fs-6"></i>Add Product</span>
</button>
</div>
<div class="row align-items-center w-100">

<div class="card col-6 col-md-4 col-lg-3 p-0 mb-2">
  <img class="card-img-top" src="img/bg1.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">John Doe</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>
  </div>

  <div class="card col-6 col-md-4 col-lg-3 p-0 mb-2">
  <img class="card-img-top" src="img/bg1.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">John Doe</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>
  </div>

  <div class="card col-6 col-md-4 col-lg-3 p-0 mb-2">
  <img class="card-img-top" src="img/bg1.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">John Doe</h4>
    <p class="card-text">Some example text.</p>
    <a class="btn btn-primary" onclick="alert('vdvdv')">Edit<i class="fa-solid fa-pen ms-1 fs-6"></i></a>
    <a class="btn btn-danger" onclick="alert('vdvdv')">Delete<i class="fa-solid fa-trash-can ms-1 fs-6"></i></a>
  </div>
  </div>

</div>


<!-- modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="input-group">
        <div class="mb-3">
            <input type="file" class="form-control"/>
        </div>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder=" ">
        <label for="floatingInput" >Name</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder=" " id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Description</label>
      </div>
      <div class="d-flex justify-content-between">
      <div class="form-floating mb-3">
        <input type="number" class="form-control form-control-sm " id="floatingInput" placeholder=" ">
        <label for="floatingInput" >Price</label>
      </div>
      <div class="form-floating mb-3">
        <input type="number" class="form-control form-control-sm " id="floatingInput" placeholder=" ">
        <label for="floatingInput" >Quantity</label>
      </div>
    </div>
    <select class="form-select" aria-label="Default select example">
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
      </div>
      <div class="modal-footer">
        <button style="background-color:#8c1c13;border:none;" type="button" class="btn rounded-pill text-white" data-bs-dismiss="modal">Close</button>
        <button style="background-color:#3A5A40;border:none;" type="button" class="btn rounded-pill text-white">Add Product</button>
      </div>
    </div>
  </div>
</div>



</body>
<script src="https://kit.fontawesome.com/16f6b89e3c.js" crossorigin="anonymous"></script>
<script>
  function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    
    setTimeout(showTime, 1000);
    
}
showTime();
</script>
</html>