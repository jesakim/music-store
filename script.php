<?php 
    session_start();
    include("db.php");
    global $conn;

    if(isset($_POST['signin'])) singin();
    if(isset($_POST['register'])) register();
    if(isset($_POST['signout'])){
        session_destroy();
        unset($_SESSION['user']);
        header('location:signin.php');
    };

    

    
    
    
    function singin(){ 
        global $conn;
        $loginemail = datacheck($_POST['loginemail']);
        $loginpass = datacheck($_POST['loginpass']);
        $loginreq = "SELECT * FROM `users` where email = '$loginemail' and password = '$loginpass';";
        $res = mysqli_query($conn, $loginreq);
        $rest = mysqli_fetch_assoc($res);
        if(mysqli_num_rows($res)!=0){
            $_SESSION['user']= $rest;
            $_SESSION['message'] = 'Your Logged In Now';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmar';
            echo $_SESSION['userid'];
            header('Location: index.php');
        }else{
            $_SESSION['message'] = 'Your Not Logged In Now';
        $_SESSION['bgcolor'] = '#F8D7DA';
        $_SESSION['headmsg'] = 'Failure!';
        $_SESSION['icon'] = 'fa-solid fa-xmar';
        }
        
    }
    function register(){
        global $conn;
        $usernam = datacheck($_POST['username']);
        $email = datacheck($_POST['email']);
        $password = datacheck($_POST['password']);
        $rpassword = datacheck($_POST['rpassword']);
        $usernamecheck = "SELECT * FROM `users` where username = '$usernam';";
        $usernamres = mysqli_query($conn, $usernamecheck);
        $emailcheck = "SELECT * FROM `users` where email = '$email';";
        $emailres = mysqli_query($conn, $emailcheck);

        if(empty($email) || empty($password) || empty($usernam) || empty($rpassword)){
            $_SESSION['message'] = 'All Inputs Are Required';
            $_SESSION['bgcolor'] = '#F8D7DA';
            $_SESSION['headmsg'] = 'Failure!';
            $_SESSION['icon'] = 'fa-solid fa-xmark';
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$usernam)){
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