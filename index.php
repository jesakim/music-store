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
    <link rel="icon" type="" href="img/icon.png">
    <title>RockStars</title>
    <style>
/* width */
::-webkit-scrollbar {
  width:10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px #3A5A40; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #3A5A40; 
  border-radius: 10px;
}
.accordion-button:not(.collapsed)::after {
    /* background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230c63e4'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e); */
    transform: rotate(-180deg);
}
button[isactive] {
  background-color: #3A5A40;
}
button[isactive]:hover {
  background-color: #146C43;
}
</style>
</head>
<body>
<div style="background-color: #3A5A40;" class="navbar">
  <div class="container-fluid">
    <a style="color: #D6FFB7;" class="navbar-brand" href="index.php">RockStars</a>
    <div class="d-flex">
    <div class="dropdown text-end mt-1 me-3 align-items-center">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/icon.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <span><?php echo $_SESSION['user']['username'] ?></span>
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
        <h5 style="color: #3A5A40;" class="offcanvas-title" id="offcanvasDarkNavbarLabel">RockStars</h5>
        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body ">
      <div class="dropdown text-start mt-1 me-3 align-items-center">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/icon.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <span><?php echo $_SESSION['user']['username'] ?></span>
          </a>
          
          <ul class="dropdown-menu text-small" style="color: #3A5A40;background-color: #D6FFB7;">
            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="addpro()">Add Product</button></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form action="script.php" method="post"><input class="dropdown-item bg-danger" type="submit" name="signout" value="Sign out"/></form></li>
          </ul>
        </div>
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a style="color: #3A5A40;" class="nav-link active" aria-current="page" href="#" data-bs-dismiss="offcanvas" aria-label="Close">Home</a>
          </li>
          <li class="nav-item">
            <a style="color: #3A5A40;" class="nav-link" href="#DashBoard" data-bs-dismiss="offcanvas" aria-label="Close">Dachboard</a>
          </li>
          <li class="nav-item dropdown">
            <a style="color: #3A5A40;" class="nav-link dropdown-toggle" href="#products" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
              Products
            </a>
            <ul style="color: #3A5A40;background-color: #D6FFB7;" class="dropdown-menu dropdown-menu">
              <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="addpro()" data-bs-dismiss="offcanvas" aria-label="Close">Add Product</button></li>
              <li><a class="dropdown-item" href="#products" data-bs-dismiss="offcanvas" aria-label="Close">Check Stock</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button style="color: #D6FFB7;background-color: #3A5A40;box-shadow:none" class="btn" type="submit" data-bs-dismiss="offcanvas" aria-label="Close">Search</button>
        </form>
      </div>
    </div>
    
  </div>
</div>
<div style="background-color:#D6FFB7;color: #3A5A40;" id="DashBoard" class="text-dark p-3 d-flex justify-content-between align-items-center">
<div class="fs-5">DashBoard</div>
<div style="font-family: Orbitron;" id="MyClockDisplay" class="clock fs-6"></div>
</div>
<div class="row w-100 ps-3">
  <div class="p-1 col-12 col-md-6">
<div class="card ">
<span class="position-absolute end-0 top-0 fs-5 me-2" style="color:#3A5A40 ;" title="Show the count of products in the stock"><i class="fa-solid fa-circle-info"></i></span>
<div class="card-body">
  <h5 class="card-title">Sales</h5>

  <div class="d-flex align-items-between">
    <div style="background-color: #3A5A40;height: 80px;width: 80px;color:#D6FFB7;" class="card-icon rounded-circle d-flex align-items-center justify-content-center pe-1">
    <i class="fa-solid fa-cart-shopping fs-3"></i>
    </div>
    <div class="row justify-content-center align-items-center w-75 ">
      <button style="background-color:#3A5A40;border:none;" type="button" class="col-9 col-md-5 rounded-pill py-2 px-3 m-1" data-bs-toggle="modal" data-bs-target="#sellModal" onclick="addpro()">
        <span class="text-white"><i class="fa-solid fa-coins me-2 fs-6"></i>Sell Product</span>
    </button>
    <button style="background-color:#3A5A40;border:none;" type="button" class="col-9 col-md-5 rounded-pill py-2 px-3" data-bs-toggle="modal" data-bs-target="#SelesHistoryModal" onclick="addpro()">
        <span class="text-white"><i class="fa-solid fa-cart-shopping me-2 fs-6"></i>Seles History</span>
    </button>
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
    <div style="background-color: #3A5A40;height: 80px;width: 80px;color:#D6FFB7;" class="card-icon rounded-circle d-flex align-items-center justify-content-center me-2">
    <i class="fa-solid fa-coins fs-3"></i>
    </div>
    <div class="w-75">
      <h3><?=  raslmale().' DHS' ?></h3>
      <div class="progress mt-1" data-height="8" style="height: 8px;width: 100%;background-color: #D6FFB7;">
            <div class="progress-bar" data-width="25%" style="width:<?=  raslmale(1) ?>%;background-color: #3A5A40;"></div>
      </div>
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
      <div class="btn-group">
  <button type="button" style="background-color: #3A5A40;color:#D6FFB7;" class="btn shadow-none rounded-pill dropdown-toggle py-2 px-3" data-bs-toggle="dropdown" name="tocheck" aria-expanded="false">
  Check Stock</button>
  <dl class="dropdown-menu" style="overflow: auto;height: 130px;">
        <?php checkstock() ?>
  </dl>
</div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div style="background-color:#D6FFB7;width: 100vw;" id="products" class="p-3 fs-5 row justify-content-between align-items-center">
<div class="col-3">Products</div>
<div class="text-end col-9 m-0 p-0">
  <input type="text" placeholder="Search By Name" class="ps-3 m-1 rounded-pill col-12 col-md-5 col-lg-3" id="searchpro" style="background: none;border: #3A5A40 solid 2px;outline: none;color: #3A5A40;" onkeyup="searchpro(this)">
<button style="background-color:#3A5A40;border:none;" type="button" class="rounded-pill p-2 m-1 col-12 col-md-5 col-lg-3" data-bs-toggle="dropdown" aria-expanded="false">
  <span class="p-3 text-white"><i class="fa-solid fa-filter me-2 fs-6"></i>Filter Products</span>
</button>
<ul class="dropdown-menu">
  <form action="script.php" method="post" class="row justify-content-center gap-2">
    <button type="submit" name="nameup" class="col-5 btn btn-success" >By Name<i class="fa-solid fa-arrow-up ms-2"></i></button>
    <button type="submit" name="namedown" class="col-5 btn btn-success" >By Name<i class="fa-solid fa-arrow-down ms-2"></i></button>
    <button type="submit" name="quantityup" class="col-5 btn btn-success">By Quantity<i class="fa-solid fa-arrow-up ms-2"></i></button>
    <button type="submit" name="quantitydown" class="col-5 btn btn-success">By Quantity<i class="fa-solid fa-arrow-down ms-2"></i></button>
    <div class="col-7">
      <select class="form-select" aria-label="Default select example" id="category" name="categoryfilter" required>
      <option value="0">Select A Category</option>
      <?php  
            global $conn;

            $sql = 'SELECT * FROM `categories`';
            $RES = mysqli_query($conn,$sql);
            
            while($row = mysqli_fetch_assoc($RES)){
              echo '<option value="'.$row['category-name'].'">'.$row['category-name'].'</option>';
            }
      ?>
    </select>
    </div>
    <button type="submit" name="categoryfilterbtn" class="col-3 btn btn-success">By Category</i></button>
    <button type="submit" name="resetfilter" class="col-10 btn btn-success">Reset Filter<i class="fa-solid fa-repeat ms-2"></i></button>
    
    
  </form>
  </ul>
<button style="background-color:#3A5A40;border:none;" type="button" class="rounded-pill p-2  col-12 col-lg-3" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="addpro()">
  <span class="p-3 text-white"><i class="fa-solid fa-plus me-2 fs-6"></i>Add Product</span>
</button>
</div>
</div>
<div class="row w-100 ps-3">
<?php if (isset($_SESSION['message'])){
				echo '<div style="background-color: '.$_SESSION["bgcolor"].';color: #3A5A40;" class="alert alert-dismissible fade show rounded-pill py-2 m-1 mb-0" id="alert" >
                <i class="'.$_SESSION['icon'].'"></i>
				<strong>'.$_SESSION['headmsg'].'</strong> 
						'. $_SESSION["message"].'
						
					</div>';
				unset($_SESSION['message']);
				unset($_SESSION['icon']);
				unset($_SESSION['headmsg']);
				unset($_SESSION['bgcolor']);
      };
          ?>
<?php 
   display()?>
</div>


<!-- modal -->
<!-- Button trigger modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body d-flex align-items-center flex-column">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 100px"><path fill="#d85b53" d="M12,7a1,1,0,0,0-1,1v4a1,1,0,0,0,2,0V8A1,1,0,0,0,12,7Zm0,8a1,1,0,1,0,1,1A1,1,0,0,0,12,15Zm9.71-7.44L16.44,2.29A1.05,1.05,0,0,0,15.73,2H8.27a1.05,1.05,0,0,0-.71.29L2.29,7.56A1.05,1.05,0,0,0,2,8.27v7.46a1.05,1.05,0,0,0,.29.71l5.27,5.27a1.05,1.05,0,0,0,.71.29h7.46a1.05,1.05,0,0,0,.71-.29l5.27-5.27a1.05,1.05,0,0,0,.29-.71V8.27A1.05,1.05,0,0,0,21.71,7.56ZM20,15.31,15.31,20H8.69L4,15.31V8.69L8.69,4h6.62L20,8.69Z" class="color000000 svgShape"/></svg>
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
      <form action="script.php" method="post" id="form" enctype="multipart/form-data" autocomplete="off">
      <div class="modal-body">
        <input type="hidden" id="idinput" name="idinput">
        <input type="hidden" id="imginput" name="imginput">
      <div class="input-group">
        <div class="mb-3">
            <input type="file" class="form-control" id="image" name="image"/>
        </div>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control form-control-sm" id="name" placeholder=" " list="names" name="name" required>
        <label for="floatingInput">Name</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder=" " id="desc" name="desc"></textarea>
        <label for="floatingTextarea">Description</label>
      </div>
      <div class="row justify-content-center">
      <div class="form-floating mb-3 col-6">
        <input type="number" step=0.01 class="form-control form-control-sm " id="price" min="0" placeholder=" " name="price" required>
        <label for="floatingInput">Price</label>
      </div>
      <div class="form-floating mb-3 col-6">
        <input type="number" class="form-control form-control-sm" id="quantity" min="0" placeholder=" " name="quantity" required>
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
      <div class="modal-footer" id="modalfooter">

      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="sellModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sell Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="script.php" method="post" id="form">
      <div class="modal-body">
    
    <select class="form-select" aria-label="Default select example" id="category" name="idtobesold" required>
              <option value="">Select a Product To Be Sold</option>
              <?php  
                      global $conn;

                      $userid = $_SESSION['user']['id'];
                      $sql = "SELECT * FROM `products` WHERE `user-id` = $userid";
                      $RES = mysqli_query($conn,$sql);
                      
                      while($row = mysqli_fetch_assoc($RES)){
                        echo '<option value="'.$row['id'].'">'.$row['name'].' ('.$row['price'].' DHS , '.$row['quantity'].' Units)</option>';
                      }
                ?>
    </select>
    <div class="form-floating mt-3">
        <input type="number" class="form-control form-control-sm" id="quantity" min="0" placeholder=" " name="quantitytobesold" required>
        <label for="floatingInput">Quantity</label>
      </div>
      </div>
      <div class="modal-footer" id="modalfooter">
      <button style="background-color:#8c1c13;border:none;" type="button" class="btn rounded-pill text-white" data-bs-dismiss="modal">Close</button>
        <button style="background-color:#3A5A40;border:none;" type="submit" class="btn rounded-pill text-white" id="markassold" name="markassold">Mark As Sold</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="SelesHistoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seles History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo" style="color : #D6FFB7; background-color: #3A5A40;box-shadow :none">
          Today (<?=  date('d-m-y') ?>)
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="">
      <table class="table table-hover table-striped m-0" style="background-color: #D6FFB7;">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Tolal</th>
                <th scope="col">Sold On</th>
              </tr>
            </thead>
            <tbody>
              <?php
                saleshistory(date('y-m-d'),date('y-m-d',strtotime("+1 days")));
                ?>
            </tbody>
      </table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color : #D6FFB7; background-color: #3A5A40;box-shadow :none">
          This Week(<?= date('d-m-y',strtotime("-7 days")).' To '. date('d-m-y')?>)
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="">
      <table class="table table-hover table-striped m-0" style="background-color: #D6FFB7;">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Tolal</th>
                <th scope="col">Sold On</th>
              </tr>
            </thead>
            <tbody>
              <?php
                saleshistory(date('y-m-d',strtotime("-7 days")),date('y-m-d',strtotime("+1 days")));
                ?>
            </tbody>
      </table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color : #D6FFB7; background-color: #3A5A40;box-shadow :none">
            This Month(<?= date('d-m-y',strtotime("-30 days")).' To '. date('d-m-y')?>)
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="">
      <table class="table table-hover table-striped m-0" style="background-color: #D6FFB7;">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Tolal</th>
                <th scope="col">Sold On</th>
              </tr>
            </thead>
            <tbody>
              <?php
                saleshistory(date('y-m-d',strtotime("-29 days")),date('y-m-d',strtotime("+1 days")));
                ?>
            </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
 </div>
  </div>
</div>
</div>



</body>
<script src="https://kit.fontawesome.com/16f6b89e3c.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
  function searchpro($input){
    let titles = document.getElementsByClassName('procard');
    
    for(let i=0;i<titles.length;i++){
          if(!titles[i].getAttribute('data').toLowerCase().includes($input.value.toLowerCase())){
              titles[i].style.display = 'none';
          }else{
            titles[i].style.display = 'block';
          }

  }
}
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
    document.getElementById('modalfooter').innerHTML = `
        <button style="background-color:#8c1c13;border:none;" type="button" class="btn rounded-pill text-white" data-bs-dismiss="modal">Close</button>
        <button style="background-color:#3A5A40;border:none;" type="submit" class="btn rounded-pill text-white" id="editpro" name="editpro">Edit Product</button>
    `

}
function addpro(){
  document.getElementById('form').reset();
  document.getElementById('modalfooter').innerHTML = `
        <button style="background-color:#8c1c13;border:none;" type="button" class="btn rounded-pill text-white" data-bs-dismiss="modal">Close</button>
        <button style="background-color:#3A5A40;border:none;" type="submit" class="btn rounded-pill text-white" id="addpro" name="addpro">Add Product</button>
    `
}
function deletepro($productid){
      document.getElementById('task-id1').value = $productid;
}
function showdesc($ss){
  $ss.innerText = 'Hide Details'
  $ss.removeAttribute('onclick');
  $ss.setAttribute('onclick',"hidedesc(this)");

}
function hidedesc($ss){
  $ss.innerText = 'Show Details'
  $ss.removeAttribute('onclick');
  $ss.setAttribute('onclick',"showdesc(this)");
}

function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
    setTimeout(hidealertmsg, 5000);
    async function hidealertmsg(){
        for(let i=0; i < 10; i++){
        document.getElementById("alert").style.opacity = 1-(i*0.1);
        await sleep(100);    
    }
        document.getElementById("alert").style.display = 'none';
    }
</script>
</html>