<?php 
    session_start();
    include("db.php");
    global $conn;

    if(isset($_POST['signin'])) singin();
    if(isset($_POST['register'])) register();
    if(isset($_POST['signout'])) signout();
    if(isset($_POST['addpro']))  addpro();
    if(isset($_POST['editpro']))  editpro();
    if(isset($_POST['delete']))  deletepro();
    if(isset($_POST['tocheck']))  checkstock();
    if(isset($_POST['markassold']))  sellpro();
    

if(isset($_POST['nameup'])){
        $_SESSION['orderby'] = 'name';
        $_SESSION['flux'] = 'ASC';
        $_SESSION['message'] = 'Products Are Filtred By '.$_SESSION['orderby'].' Up';
        $_SESSION['bgcolor'] = '#D6FFB7';
        $_SESSION['headmsg'] = 'Success!';
        $_SESSION['icon'] = 'fa-solid fa-check';
        unset($_SESSION['categoryfilter']);

        header('location:index.php');
}
if(isset($_POST['namedown'])){
    $_SESSION['orderby'] = 'name';
    $_SESSION['flux'] = 'DESC';
    $_SESSION['message'] = 'Products Are Filtred By '.$_SESSION['orderby'].' Down';
    $_SESSION['bgcolor'] = '#D6FFB7';
    $_SESSION['headmsg'] = 'Success!';
    $_SESSION['icon'] = 'fa-solid fa-check';
    unset($_SESSION['categoryfilter']);

    header('location:index.php');
}
if(isset($_POST['quantityup'])){
    $_SESSION['orderby'] = 'quantity';
    $_SESSION['flux'] = 'ASC';
    $_SESSION['message'] = 'Products Are Filtred By '.$_SESSION['orderby'].' Up';
    $_SESSION['bgcolor'] = '#D6FFB7';
    $_SESSION['headmsg'] = 'Success!';
    $_SESSION['icon'] = 'fa-solid fa-check';
    unset($_SESSION['categoryfilter']);

    header('location:index.php');
}
if(isset($_POST['quantitydown'])){
    $_SESSION['orderby'] = 'quantity';
    $_SESSION['flux'] = 'DESC';
    $_SESSION['message'] = 'Products Are Filtred By '.$_SESSION['orderby'].' Down';
    $_SESSION['bgcolor'] = '#D6FFB7';
    $_SESSION['headmsg'] = 'Success!';
    $_SESSION['icon'] = 'fa-solid fa-check';
    unset($_SESSION['categoryfilter']);

    header('location:index.php');
}
if(isset($_POST['resetfilter'])){
    $_SESSION['orderby'] = 'id';
    $_SESSION['flux'] = 'ASC';
    $_SESSION['message'] = 'Filter Is Reseted Successfully';
    $_SESSION['bgcolor'] = '#D6FFB7';
    $_SESSION['headmsg'] = 'Success!';
    $_SESSION['icon'] = 'fa-solid fa-check';
    unset($_SESSION['categoryfilter']);
    header('location:index.php');
}
if(isset($_POST['categoryfilterbtn'])){
    if($_POST['categoryfilter'] != 0){
    $_SESSION['categoryfilter'] = $_POST['categoryfilter'];

    $_SESSION['message'] = 'Filter Is By '.$_SESSION['categoryfilter'].' Category';
    $_SESSION['bgcolor'] = '#D6FFB7';
    $_SESSION['headmsg'] = 'Success!';
    $_SESSION['icon'] = 'fa-solid fa-check';}
    header('location:index.php');
}

function saleshistory($time1,$time2){
    global $conn;
    $userid = $_SESSION['user']['id'];
    $sql = "SELECT * FROM `sales` INNER JOIN products ON products.id = sales.product_id WHERE `user-id` = $userid AND sales.date BETWEEN '$time1' and '$time2' ;";
    $res = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($res)){
        echo '<tr>
        <th scope="row">'.$row['name'].'</th>
        <td>'.$row['quatity_sold'].'</td>
        <td>'.$row['total'].'</td>
        <td>'.$row['date'].'</td>
      </tr>';
    }

}


function sellpro(){
    $quantitytobesold = $_POST['quantitytobesold'];
    $idtobesold = $_POST['idtobesold'];
    global $conn;
    $check = "SELECT * FROM `products` WHERE `id`= $idtobesold ";
    $res = mysqli_query($conn, $check);
    $row = mysqli_fetch_assoc($res);
    if($row['quantity'] >= $quantitytobesold){
        $newquantity = $row['quantity'] - $quantitytobesold ;
        $total = $row['price'] * $quantitytobesold;
        $update = "UPDATE `products` SET `quantity`= $newquantity WHERE `id`= $idtobesold ";
        mysqli_query($conn, $update);
        $sql = "INSERT INTO `sales`(`product_id`,`quatity_sold`,`total`) VALUES ( $idtobesold , $quantitytobesold , $total)";
        mysqli_query($conn, $sql);
        $_SESSION['message'] = $quantitytobesold.' Units Of '.$row['name'].' Sold Successfully';
        $_SESSION['bgcolor'] = '#D6FFB7';
        $_SESSION['headmsg'] = 'Success!';
        $_SESSION['icon'] = 'fa-solid fa-check';
    }else{
        $_SESSION['message'] = 'You Have Only '.$row['quantity'].' Units In The Stock';
        $_SESSION['bgcolor'] = '#F8D7DA';
        $_SESSION['headmsg'] = 'Sorry!';
        $_SESSION['icon'] = 'fa-solid fa-xmark';;
    }
    header('location:index.php');

}

function checkstock(){
          global $conn;
          $userid = $_SESSION['user']['id'];
          $ntc = 5;
          $sql = "SELECT * FROM `products` WHERE `user-id`= $userid and `quantity` <= $ntc ";
          $res = mysqli_query($conn, $sql);
          if(mysqli_num_rows($res)==0){
            echo '<dt class="ms-2">There Is No Quantity Below 5</dt>';
          }else{while($row = mysqli_fetch_assoc($res)){
              echo '<dt class="ms-2">'.$row['name'].'</dt>
                    <dd class="ms-2 text-danger">- Quantity : '.$row['quantity'].'</dd>';
          }}
    }
function raslmale($pa = 0){
        global $conn;
          $userid = $_SESSION['user']['id'];
          $raslmal = 0;
          $sql = "SELECT * FROM `products` WHERE `user-id`= $userid ";
          $res = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($res)){
            $raslmal += $row['price'] * $row['quantity'];
          }
          if($pa == 0)return $raslmal;
          else{
            return $raslmal/10000;
          }
          
    }
    function signout(){
        session_destroy();
        header('location:signin.php');
    };
    function deletepro(){
        global $conn;
        $id = $_POST['task-id1'];
        $sql = "DELETE FROM `products` WHERE `id` = $id";
        mysqli_query($conn, $sql);
        
        $_SESSION['message'] = 'Product Deleted Successfully';
            $_SESSION['bgcolor'] = '#D6FFB7';
            $_SESSION['headmsg'] = 'Success!';
            $_SESSION['icon'] = 'fa-solid fa-check';
        header('location:index.php');
    }
    function editpro(){
        global $conn;
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $category = $_POST['category'];
        $imagen = $_POST['imginput'];
        $id = $_POST['idinput'];
        $image = $_FILES['image'];
        if(!empty($image['name'])){
            $NewImageName = "proimg-".$image['name'];
            move_uploaded_file($_FILES["image"]["tmp_name"],"proimg/".$NewImageName);
        }else{
            $NewImageName = $imagen;
        }
        $sql = "UPDATE `products` SET `name`='$name',`description`='$desc',`price`='$price',
        `quantity`='$quantity',`category-id`='$category',`img`='$NewImageName' WHERE `id`= $id ";
        mysqli_query($conn, $sql);
        $_SESSION['message'] = 'Product Updated Successfully';
            $_SESSION['bgcolor'] = '#D6FFB7';
            $_SESSION['headmsg'] = 'Success!';
            $_SESSION['icon'] = 'fa-solid fa-check';
        header('location:index.php');
    }
    function procount($userid){
        global $conn;
        $sql = "SELECT * FROM `products` WHERE `user-id`=$userid";
        $count = mysqli_num_rows(mysqli_query($conn, $sql));
        if($count == 1){
            return $count." Product";
        }else{
            return $count." Products";
        }
    }

    function addpro(){
        global $conn;
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $category = $_POST['category'];
        $image = $_FILES['image'];
        $id = $_SESSION['user']['id'];
        if(!empty($image['name'])){
            $NewImageName = "proimg-".$image['name'];
            move_uploaded_file($_FILES["image"]["tmp_name"],"proimg/".$NewImageName );
        }else{
            $NewImageName = "default.png";
        }

        $sql = "INSERT INTO `products`(`name`, `description`, `price`, `quantity`, `category-id`, `img`, `user-id`) 
        VALUES ('$name','$desc','$price','$quantity','$category','$NewImageName','$id')";
        mysqli_query($conn, $sql);
        $_SESSION['message'] = 'Product Added Successfully';
            $_SESSION['bgcolor'] = '#D6FFB7';
            $_SESSION['headmsg'] = 'Success!';
            $_SESSION['icon'] = 'fa-solid fa-check';
        header('location:index.php');
    }


    function singin(){ 
        global $conn;
        $loginemail = datacheck($_POST['loginemail']);
        $loginpass = datacheck($_POST['loginpass']);
        $loginreq = "SELECT * FROM `users` where email = '$loginemail' ";
        $res = mysqli_query($conn, $loginreq);
        $rest = mysqli_fetch_assoc($res);
        if(password_verify($loginpass,$rest['password'])){
            $_SESSION['user']= $rest;
            $_SESSION['orderby'] = 'id';
            $_SESSION['flux'] = 'ASC';
            if(isset($_POST['RMcheckbox'])) 
            {
                setcookie('email_cookie',$loginemail,time() + 3600,'/');   
                setcookie('password_cookie',$loginpass,time() + 3600,'/');
            }else{
                setcookie('email_cookie','',time() - 3600,'/');   
                setcookie('password_cookie','',time() - 3600,'/');
            }
            header('Location: index.php');
        }elseif( mysqli_num_rows($res) == 0){
            setcookie('email_cookie',$loginemail,time()+3600,'/');
            $_SESSION['message'] = $loginemail.' does not match our records <br> <span style="cursor: default;" onclick="registerF()" class="ms-2">Click Here To Register With <strong>'.$loginemail.'</strong></span>';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Sorry!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
            header('Location: signin.php');
        }
        else{
            setcookie('email_cookie',$loginemail,time()+3600,'/');
            $_SESSION['message'] = 'The Password you entered does not match our records';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Sorry!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
            header('Location: signin.php');
        }
        
    }
    function register(){
        global $conn;
        $username = datacheck($_POST['username']);
        $email = datacheck($_POST['email']);
        $password = datacheck($_POST['password']);
        $rpassword = datacheck($_POST['rpassword']);
        $usernamecheck = "SELECT * FROM `users` where username = '$username';";
        $usernamres = mysqli_query($conn, $usernamecheck);
        $emailcheck = "SELECT * FROM `users` where email = '$email';";
        $emailres = mysqli_query($conn, $emailcheck);

        if(empty($email) || empty($password) || empty($username) || empty($rpassword)){
            $_SESSION['message'] = 'All Inputs Are Required';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$username)){
            $_SESSION['message'] = 'Only Letters And White Space Allowed In The UserName';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
        }elseif(mysqli_num_rows($usernamres)!=0){
            $_SESSION['message'] = 'This Username Is Already Token';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['message'] = 'Please Entre A Valid Email';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
        }elseif(mysqli_num_rows($emailres)!=0){
                $_SESSION['message'] = 'This Email Is Already Token';
                $_SESSION['bgcolor'] = '#F8D7DA';
                $_SESSION['headmsg'] = 'Failure!';
                $_SESSION['icon'] = 'fa-solid fa-xmark';
        }elseif($password != $rpassword){
            $_SESSION['message'] = 'The Passwords Are Not Identical';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
        }else{
            $password = password_hash($password,PASSWORD_ARGON2ID);
            $sql = "INSERT INTO `users`(`username`, `email`, `password`) 
            VALUES ('$username','$email','$password')";
            mysqli_query($conn, $sql);
            setcookie('email_cookie',$email,time()+3600,'/');
            $_SESSION['message'] = 'You Are Registred Now';
            $_SESSION['bgcolor'] = '#D6FFB7';
            $_SESSION['headmsg'] = 'Success!';
            $_SESSION['icon'] = 'fa-solid fa-check';
        }


        header('Location: signin.php');
    }
    function datacheck($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
     
    function display(){
            global $conn;
            $orderby = $_SESSION['orderby'];
            $flux = $_SESSION['flux'];
            $userid = $_SESSION['user']['id'];
            $sql = "SELECT products.id as proid ,products.*,`category-name` FROM `products` INNER JOIN categories on `category-id`=categories.id WHERE `user-id` = $userid ORDER BY $orderby $flux ";
            
            if(isset($_SESSION['categoryfilter'])){
                $categoryfilter = $_SESSION['categoryfilter'];
                $sql = "SELECT products.id as proid ,products.*,`category-name` FROM `products` INNER JOIN categories on `category-id`=categories.id WHERE `category-name`=  '$categoryfilter' and `user-id` = $userid ";
            }
            $RES = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($RES)){
            echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 p-1 procard" data="'.$row['name'].'">
            <div class="card">
            <div style="height: 250px;background-image:url(proimg/'.$row['img'].');background-position: center;background-repeat: no-repeat;background-size: cover;"></div>
              <div class="card-body">
                <h4 class="card-title text-truncate" title="'.$row['name'].'" id="title'.$row['id'].'" price="'.$row['price'].'" quantity="'.$row['quantity'].'" category="'.$row['category-id'].'" img="'.$row['img'].'" description="'.$row['description'].'">'.$row['name'].'</h4>
                <a class="btn text-muted shadow-none p-0" data-bs-toggle="collapse" id="showdesc" data-bs-target="#collapse'.$row['id'].'" role="button" aria-expanded="false" aria-controls="collapse" onclick="showdesc(this)">
                    Show Details
                </a>
                </div>
                <div class="card-footer w-100 m-0 bg-transparent row collapse" id="collapse'.$row['id'].'">
                    <p class="card-text mb-1 collapse" id="collapse'.$row['id'].'" title="'.$row['description'].'">'.$row['description'].'</p>
                    <span style="background-color: #3A5A40;border:white solid 5px;" class="btn rounded-pill text-white">'.$row['category-name'].'</span>
                    <span style="background-color: #D6FFB7;border:white solid 5px;" class="btn rounded-pill col-6" >Price :'.$row['price'].'</span>
                    <span style="background-color: #D6FFB7;border:white solid 5px;" class="btn rounded-pill col-6" >Quantity :'.$row['quantity'].'</span>
                </div>
                <div class="card-footer w-100 bg-transparent row gap-2 justify-content-center m-0">
                  <a class="btn text-white shadow-none me-2 rounded-pill col-5" style="background-color: #3A5A40;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editpro('.$row["proid"].')">Edit<i class="fa-solid fa-pen ms-1 fs-6"></i></a>
                  <a href="#ModalCenter" id="task-delete-btn" data-bs-toggle="modal" class="btn btn-danger shadow-none rounded-pill col-5" onclick="deletepro('.$row["proid"].')">Delete<i class="fa-solid fa-trash-can ms-1 fs-6"></i></a>
                </div>
              </div></div>
            ';
            }
    }
?>