<?php 
    session_start();
    include("db.php");
    global $conn;
    
    if(isset($_POST['signin'])) singin();
    if(isset($_POST['register'])) register();
    
    
    
    
    
    function singin(){ 
        global $conn;
        $loginemail = datacheck($_POST['loginemail']);
        $loginpass = datacheck($_POST['loginpass']);
        $loginreq = "SELECT * FROM `users` where email = '$loginemail' and password = '$loginpass';";
        $res = mysqli_query($conn, $loginreq);
        if(mysqli_num_rows($res)!=0){
          $_SESSION['message'] = 'Your Logged In Now';
        $_SESSION['bgcolor'] = '#D6FFB7';
        $_SESSION['headmsg'] = 'Success!';
        $_SESSION['icon'] = 'fa-solid fa-check';  
        }else{
            $_SESSION['message'] = 'Your Not Logged In Now';
        $_SESSION['bgcolor'] = '#F8D7DA';
        $_SESSION['headmsg'] = 'Failure!';
        $_SESSION['icon'] = 'fa-solid fa-xmar';
        }
        header('Location: index.php');
    }
    function register(){
        global $conn;
        $usernam = datacheck($_POST['username']);
        $email = datacheck($_POST['email']);
        $password = datacheck($_POST['password']);
        $rpassword = datacheck($_POST['rpassword']);
        $check = "SELECT * FROM `users` where username = '$usernam';";
        $res = mysqli_query($conn, $check);

        if(empty($email) || empty($password) || empty($usernam) || empty($rpassword)){
            $_SESSION['message'] = 'All Inputs Are Required';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
        }elseif(mysqli_num_rows($res)!=0){
            $_SESSION['message'] = 'This Username Is Already Token';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
        }elseif($password != $rpassword){
            $_SESSION['message'] = 'The Passwords Are Not Identical';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
        }else{
            $sql = "INSERT INTO `users`(`username`, `email`, `password`) 
            VALUES ('$usernam','$email','$password')";
            mysqli_query($conn, $sql);
            $_SESSION['message'] = 'You Are Registred Now';
            $_SESSION['bgcolor'] = '#D6FFB7';
            $_SESSION['headmsg'] = 'Success!';
            $_SESSION['icon'] = 'fa-solid fa-check';
        }


        header('Location: index.php');
    }
    function datacheck($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
     




?>