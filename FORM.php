<?php
    session_start();
    include("db.php");
    global $conn;
    if(isset($_POST['addpro']))  addpro();
    function addpro(){
        global $conn;
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $image = $_FILES['image'];
        if(!empty($image['name'][0])){
            $NewImageName = "proimg-".$image['name'][0];
            move_uploaded_file($_FILES["image"]["tmp_name"][0],"proimg/".$NewImageName );
        }else{
            $NewImageName = "default.png";
        }

        $sql = "INSERT INTO `products`(`name`, `description`, `price`, `quantity`, `img`)
        VALUES ('$name','$desc','$price','$quantity','$NewImageName')";
        mysqli_query($conn, $sql);
    }
    // echo date('y-m-d',strtotime("-7 days"));
    // echo date('y-m-d'),strtotime("-1 days"));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="input-group">
        <div class="mb-3">
            <input type="file" class="form-control" name="image[]"/>
        </div>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder=" " name="name">
        <label for="floatingInput">Name</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder=" " id="floatingTextarea" name="desc"></textarea>
        <label for="floatingTextarea">Description</label>
      </div>
      <div class="d-flex justify-content-between">
      <div class="form-floating mb-3">
        <input type="number" step=0.01 class="form-control form-control-sm " id="floatingInput" placeholder=" " name="price">
        <label for="floatingInput" >Price</label>
      </div>
      <div class="form-floating mb-3">
        <input type="number" class="form-control form-control-sm " id="floatingInput" placeholder=" " name="quantity">
        <label for="floatingInput" >Quantity</label>
      </div>
    </div>
    <select class="form-select" aria-label="Default select example" name="category">
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
        <button style="background-color:#3A5A40;border:none;" type="submit" class="btn rounded-pill text-white" name="addpro">Add Product</button>
      </div>
      </form>
</body>
</html>