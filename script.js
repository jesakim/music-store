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
            <input type="text" id="loginName" class="rounded-pill w-100 p-2" required oninvalid="setCustomValidity('Please Entre Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
            <label class="form-label" for="loginName" id="NameLabel">Email</label>
        </div>
        <div class="form-outline">
            <input type="password" id="loginPassword" class="rounded-pill w-100 p-2" required onkeyup="counter()" oninvalid="setCustomValidity('Please Entre Password');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
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
        <input type="text" id="loginName" class="rounded-pill w-100 p-2" required oninvalid="setCustomValidity('Please Entre UserName');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
        <label class="form-label" for="loginName">UserName</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" id="loginEmail" class="rounded-pill w-100 p-2" required oninvalid="setCustomValidity('Please Entre Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40';"/>
        <label class="form-label" for="loginName">Email</label>
    </div>
    <div class="form-outline mb-4">
        <input type="password" id="loginPassword" class="rounded-pill w-100 p-2" required oninvalid="setCustomValidity('Please Entre Password');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
        <label class="form-label" for="loginPassword">Password</label>
    </div>
    <div class="form-outline">
        <input type="password" id="RPassword" class="rounded-pill w-100 p-2" required oninvalid="setCustomValidity('Please Reentre Password');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';"/>
        <label class="form-label" for="loginPassword" id="PasswordLabel">Repeat Password</label>
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
        <input type="text" id="loginEmail" class="rounded-pill w-100 p-2" required oninvalid="setCustomValidity('Please Entre Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#D6FFB7 solid 2px';this.nextElementSibling.style.color = '#3A5A40'"/>
        <label class="form-label" for="loginName">Email To Reset Password</label>
    </div>
    <button type="submit" id="button" name="passres" class="btn w-100 mb-4 rounded-pill">Reset Password</button>

`
}
setTimeout(hidealertmsg, 3000);
function hidealertmsg(){
    document.getElementById("alert").style.display='none';
}
document.getElementById("RPassword").oninput = function(){
    if(this.value == document.getElementById("loginPassword")){}


};