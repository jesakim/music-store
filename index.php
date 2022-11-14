<?php
        include('script.php');
        if(!isset($_SESSION['user'])){
              header('Location: signin.php');
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <span><?php echo $_SESSION['user']['username']?></span>
          </a>
          
          <ul class="dropdown-menu text-small" style="color: #3A5A40;background-color: #D6FFB7;">
            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="addpro()">Add Product</button></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form action="script.php" method="post"><input class="dropdown-item bg-danger" type="submit" name="signout" value="Sign out"/></form></li>
          </ul>
        </div>
    <button class="navbar-toggler text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <i class="fa-solid fa-bars "></i>
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
              <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="addpro()">Add Product</button></li>
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
<div class="row w-100 ps-3">
  <div class="p-1 col-12 col-md-6">
<div class="card ">
<span class="position-absolute end-0 top-0 fs-5 me-2" style="color:#3A5A40 ;" title="Show the count of products in the stock"><i class="fa-solid fa-circle-info"></i></span>
<div class="card-body">
  <h5 class="card-title">Sales <span>| Today</span></h5>

  <div class="d-flex align-items-center">
    <div style="background-color: #3A5A40;height: 80px;width: 80px;color:#D6FFB7;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
    <i class="fa-solid fa-cart-shopping fs-3"></i>
    </div>
    <div class="ps-3">
      <h3>145</h3>
    </div>
  </div>
</div></div>
</div>
<div class="p-1 col-12 col-md-6">
<div class="card">
<span class="position-absolute end-0 top-0 fs-5 me-2" style="color:#3A5A40 ;" title="Show the count of products in the stock"><i class="fa-solid fa-circle-info"></i></span>

<div class="card-body">
  <h5 class="card-title">Products</h5>

  <div class="d-flex align-items-center">
    <div style="background-color: #3A5A40;height: 80px;width: 80px;color:#D6FFB7;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
    <i class="fa-solid fa-boxes-stacked fs-3"></i>
    </div>
    <div class="ps-4">
      <h3><?= procount($_SESSION['user']['id']) ?> </h3>
    </div>
  </div>
</div>
</div>
</div>
<div class="p-1 col-12 col-md-6">

<div class="card">
<span class="position-absolute end-0 top-0 fs-5 me-2" style="color:#3A5A40 ;" title="Show the total of products prices time products quantity"><i class="fa-solid fa-circle-info"></i></span>
<div class="card-body">
  <h5 class="card-title">RasLmale</h5>

  <div class="d-flex align-items-center">
    <div style="background-color: #3A5A40;height: 80px;width: 80px;color:#D6FFB7;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
    <i class="fa-solid fa-coins fs-3"></i>
    </div>
    <div class="ps-4">
      <h3><?=  raslmale().' DHS'  ?></h3>
    </div>
  </div>
</div>
</div>
</div>
<div class="p-1 col-12 col-md-6">

<div class="card">
<span class="position-absolute end-0 top-0 fs-5 me-2" style="color:#3A5A40 ;" title="Show names of products that their quantity less than 5"><i class="fa-solid fa-circle-info"></i></span>
<div class="card-body">
  <h5 class="card-title">Check Stock</h5>

  <div class="d-flex align-items-center">
    <div style="background-color: #3A5A40;height: 80px;width: 80px;color:#D6FFB7;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
    <i class="fa-solid fa-arrow-trend-down fs-3"></i>
    </div>
    <div class="ps-4">
      <div class="btn-group dropend">
  <button type="button" style="background-color: #3A5A40;color:#D6FFB7;" class="btn shadow-none rounded-pill dropdown-toggle py-2 px-3" data-bs-toggle="dropdown" name="tocheck" aria-expanded="false">
  Check Stock</button>
  <dl class="dropdown-menu">
        <?php checkstock() ?>
  </dl>
</div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div style="background-color:#D6FFB7;" class="p-3 fs-5 d-flex justify-content-between align-items-center">
<div>Products</div>
<button style="background-color:#3A5A40;border:none;" type="button" class="rounded-pill p-2" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="addpro()">
  <span class="p-3 text-white"><i class="fa-solid fa-plus me-2 fs-6"></i>Add Product</span>
</button>
</div>
<div class="row w-100 ps-3">
  <!-- display products -->
  <?php display($_SESSION['user']['id'])?>
</div>


<!-- modal -->
<!-- Button trigger modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-danger" id="exampleModalLongTitle">Alert</h1>
      </div>
      <div class="modal-body">
        <h4>Do You Really Want To Delete This Product</h4> 
      </div>
      <form class="modal-footer" action="script.php" method="POST" id="form-task1">
	  	<input type="hidden"  class="form-control" id="task-id1" name="task-id1"/>
		<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
		<button  type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete">Delete</button>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" id="form" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" id="idinput" name="idinput">
        <input type="hidden" id="imginput" name="imginput">
      <div class="input-group">
        <div class="mb-3">
            <input type="file" class="form-control" id="image" name="image"/>
        </div>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control form-control-sm" id="name" placeholder=" " name="name" required>
        <label for="floatingInput">Name</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder=" " id="desc" name="desc"></textarea>
        <label for="floatingTextarea">Description</label>
      </div>
      <div class="d-flex justify-content-between">
      <div class="form-floating mb-3">
        <input type="number" step=0.01 class="form-control form-control-sm " id="price" min="0" placeholder=" " name="price" required>
        <label for="floatingInput" >Price</label>
      </div>
      <div class="form-floating mb-3">
        <input type="number" class="form-control form-control-sm " id="quantity" min="0" placeholder=" " name="quantity" required>
        <label for="floatingInput" >Quantity</label>
      </div>
    </div>
    <select class="form-select" aria-label="Default select example" id="category" name="category" required>
      <?php  
            global $conn;

            $sql = 'SELECT * FROM `categories`';
            $RES = mysqli_query($conn,$sql);
            
            while($row = mysqli_fetch_assoc($RES)){
              echo '<option value="'.$row['id'].'">'.$row['category-name'].'</option>';
            }
      ?>
    </select>
      </div>
      <div class="modal-footer">
        <button style="background-color:#8c1c13;border:none;" type="button" class="btn rounded-pill text-white" data-bs-dismiss="modal">Close</button>
        <button style="background-color:#3A5A40;border:none;" type="submit" class="btn rounded-pill text-white" id="addpro" name="addpro">Add Product</button>
        <button style="background-color:#3A5A40;border:none;" type="submit" class="btn rounded-pill text-white" id="editpro" name="editpro">Edit Product</button>
      </div>
      </form>
    </div>
  </div>
</div>



</body>
<script src="https://kit.fontawesome.com/16f6b89e3c.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
function editpro($productid){
    document.getElementById('name').value = document.getElementById('title'+$productid).innerText;
    document.getElementById('desc').value = document.getElementById('title'+$productid).getAttribute('description');
    document.getElementById('category').value = document.getElementById('title'+$productid).getAttribute('category');
    document.getElementById('price').value = document.getElementById('title'+$productid).getAttribute('price');
    document.getElementById('quantity').value = document.getElementById('title'+$productid).getAttribute('quantity');
    document.getElementById('imginput').value = document.getElementById('title'+$productid).getAttribute('img');
    document.getElementById('idinput').value = $productid;
    document.getElementById('addpro').style.display = 'none';
    document.getElementById('editpro').style.display = 'block';

}
function addpro(){
  document.getElementById('form').reset();
  document.getElementById('editpro').style.display = 'none';
  document.getElementById('addpro').style.display = 'block';
}
function deletepro($productid){
      document.getElementById('task-id1').value = $productid;
}
</script>
</html>