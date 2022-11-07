<?php  
    include("script.php");
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="icon" type="" href="img/icon.png">
    <link rel="stylesheet" href="style.css">
    <title>Sign In Page</title>
</head>
<body>
    <div class="containe">
        <ul class="d-flex justify-content-between mb-4 p-0">
            <li id="buttonS" class="btn my-3 w-50 me-2 ms-0 rounded-pill" onclick="signinF()">Sign In</li>
            <li id="buttonR" class="btn my-3 w-50 ms-2 rounded-pill" onclick="registerF()">Register Now</li>
        </ul>
        <?php if (isset($_SESSION['message'])){
				echo '<div style="background-color: '.$_SESSION["bgcolor"].';color:#3A5A40" class="alert alert-dismissible fade show rounded-pill py-2" id="alert" >
                <i class="'.$_SESSION['icon'].'"></i>
				<strong>'.$_SESSION['headmsg'].'</strong> 
						'. $_SESSION["message"].'
						
					</div>';
				unset($_SESSION['message']);
				unset($_SESSION['icon']);
				unset($_SESSION['headmsg']);
				unset($_SESSION['bgcolor']);};
          ?>
      <form action="script.php" id="formbody" class="mb-2" method="post">
        <div class="form-outline mb-4">
            <input type="text" id="loginName" name="loginemail" class="rounded-pill w-100" required oninvalid="setCustomValidity('Please Entre Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
            <label class="form-label" for="loginName" id="NameLabel">Email</label>
        </div>
        <div class="form-outline">
            <input type="password" id="loginPassword" name="loginpass" class="rounded-pill w-100" required onkeyup="counter()" oninvalid="setCustomValidity('Please Entre Password');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
            <label class="form-label" for="loginPassword" id="PasswordLabel">Password</label>
            <span class="input-group-append" id="icon1">
                <i class="fa-regular fa-eye text-white p-2" onclick="displayPassword()"></i>
            </span>
            <span class="input-group-append" id="icon2">
                <i class="fa-regular fa-eye-slash text-white p-2" onclick="hidePassword()"></i>
            </span>
          </div>
              <!-- Checkbox -->
              <div class="my-3 d-flex justify-content-between">
                <div class="form-check form-switch ms-4">
                <input id="flexSwitchCheckDefault" class="form-check-input" type="checkbox" value=""/>
                <label class="form-check-label text-white" for="loginCheck">Remember me</label></div>
                <button style="color: #D6FFB7;" class="btn me-4 bg-transparent p-0" onclick="passReset()">Forgot password?</button>
              </div>
        <button type="submit" id="button" name="signin" class="btn w-100 mb-4 rounded-pill">Sign in</button>
      </form>
      <div class="text-center">
        <p class="text-white">Or Sign In With :</p>
        <ul class="nav d-flex justify-content-evenly">
            <li id="button" class="btn rounded-circle px-3"><i  class="fa-brands fa-facebook-f"></i></li>
            <li id="button" class="btn rounded-circle"><i  class="fa-brands fa-twitter"></i></li>
            <li id="button" class="btn rounded-circle"><i  class="fa-brands fa-google"></i></li>
            <li id="button" class="btn rounded-circle"><i  class="fa-brands fa-github"></i></li>
        </ul>
    </div>
    </div>
    
</body>
<script >
    function displayPassword(){
    document.getElementById("icon1").style.display = "none"
    document.getElementById("icon2").style.display = "block"
    document.getElementById("loginPassword").removeAttribute("type")
}
function hidePassword(){
    document.getElementById("icon2").style.display = "none"
    document.getElementById("icon1").style.display = "block"
    document.getElementById("loginPassword").setAttribute("type","password")
}
function signinF(){
    document.getElementById("buttonS").style.backgroundColor = "#3A5A40",
    document.getElementById("buttonR").style.backgroundColor = "#D6FFB7",
    document.getElementById("buttonR").style.color = "#3A5A40",
    document.getElementById("buttonS").style.color = "#D6FFB7",
    document.getElementById("formbody").innerHTML = `
    <div class="form-outline mb-4">
            <input type="text" id="loginName" name="loginemail" class="rounded-pill w-100" required oninvalid="setCustomValidity('Please Entre Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
            <label class="form-label" for="loginName" id="NameLabel">Email</label>
        </div>
        <div class="form-outline">
            <input type="password" id="loginPassword" name="loginpass" class="rounded-pill w-100" required onkeyup="counter()" oninvalid="setCustomValidity('Please Entre Password');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
            <label class="form-label" for="loginPassword" id="PasswordLabel">Password</label>
            <span class="input-group-append" id="icon1">
                <i class="fa-regular fa-eye text-white p-2" onclick="displayPassword()"></i>
            </span>
            <span class="input-group-append" id="icon2">
                <i class="fa-regular fa-eye-slash text-white p-2" onclick="hidePassword()"></i>
            </span>
          </div>
              <!-- Checkbox -->
              <div class="my-3 d-flex justify-content-between">
                <div class="form-check form-switch ms-4">
                <input id="flexSwitchCheckDefault" class="form-check-input" type="checkbox" value=""/>
                <label class="form-check-label text-white" for="loginCheck">Remember me</label></div>
                <button style="color: #D6FFB7;" class="btn me-4 bg-transparent p-0" onclick="passReset()">Forgot password?</button>
              </div>
        <button type="submit" id="button" name="signin" class="btn w-100 mb-4 rounded-pill">Sign in</button>
    `
}
function registerF(){
    document.getElementById("buttonR").style.backgroundColor = "#3A5A40",
    document.getElementById("buttonS").style.backgroundColor = "#D6FFB7",
    document.getElementById("buttonS").style.color = "#3A5A40",
    document.getElementById("buttonR").style.color = "#D6FFB7",
    document.getElementById("formbody").innerHTML = `
    <div class="form-outline mb-4">
        <input type="text" id="loginName" name="username" class="rounded-pill w-100" required onkeydown="forceLower(this)" onkeyup="forceLower(this)" oninvalid="setCustomValidity('Please Entre UserName');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
        <label class="form-label" for="loginName">UserName</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" id="loginEmail" name="email" class="rounded-pill w-100" required oninvalid="setCustomValidity('Please Entre Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40';"/>
        <label class="form-label" for="loginName">Email</label>
    </div>
    <div class="form-outline mb-4">
        <input type="password" id="FPassword" name="password" class="rounded-pill w-100" required oninvalid="setCustomValidity('Please Entre Password');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
        <label class="form-label" for="Password">Password</label>
    </div>
    <div class="form-outline">
        <input type="password" id="RPassword" name="rpassword" class="rounded-pill w-100" required oninvalid="setCustomValidity('The Passwords Are Not Identical');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" onkeyup="rpass(this)" onkeydown="rpass(this)" />
        <label class="form-label" for="Password" id="PasswordLabel">Repeat Password</label>
    </div>
          <!-- Checkbox -->
          <div class="form-check form-switch my-3 ms-3">
            <input id="flexSwitchCheckDefault" class="form-check-input" type="checkbox" value="" id="loginCheck"/>
            <label class="form-check-label text-white" for="loginCheck">I Have Read And Agree To The Terms</label>
          </div>
    <button type="submit" id="button" name="register" class="btn w-100 mb-4 rounded-pill">Register</button>`
}
function counter(){
    $value = document.getElementById("loginPassword").value;
    if($value.length != 0){
        document.getElementById("PasswordLabel").innerText = "Password("+ $value.length +")"
    }else{
        document.getElementById("PasswordLabel").innerText = "Password"; 
    } 
}
function passReset(){
    document.getElementById("formbody").innerHTML = `
    <div class="form-outline mb-4">
        <input type="text" id="loginEmail" class="rounded-pill w-100" required oninvalid="setCustomValidity('Please Entre Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
        <label class="form-label" for="loginName">Email To Reset Password</label>
    </div>
    <button type="submit" id="button" name="passres" class="btn w-100 mb-4 rounded-pill">Reset Password</button>

`
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
function forceLower(strInput) {
    strInput.value=strInput.value.toLowerCase();
}
function rpass(inp){
    if(inp.value == document.getElementById("FPassword").value){
    inp.setCustomValidity('');
    inp.style.border = '#D6FFB7 solid 2px';
    inp.nextElementSibling.style.color = '#3A5A40';}else{
        inp.setCustomValidity('The Passwords Are Not Identical');
    }
}
</script>
</html>