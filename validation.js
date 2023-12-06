function validateForm(event) {
  event.preventDefault();

  var username = document.getElementById("username").value.trim();
  var email = document.getElementById("email").value.trim();
  var password = document.getElementById("password").value.trim();
  var confirmPassword = document.getElementById("confirmPassword").value.trim();

  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  var isValid = true;

  if(username.length < 5 || username.length > 10) {
    isValid = false;
        document.getElementById('usernameErr').innerText = 'Username must between 5 and 10 character.';
    } else {
        document.getElementById('usernameErr').innerText = '';
    }
  

  if(!emailRegex.test(email)) {
    isValid = false;
    document.getElementById('emailErr').innerText = 'Please enter a valid email address.';
  } else {
    document.getElementById('emailErr').innerText = '';
  }

  if(password.length < 5 || password.length > 10) {
    isValid = false;
    document.getElementById("passwordErr").innerHTML = 'Password must between 5 and 10 characters';
  } else {
    document.getElementById("passwordErr").innerHTML = '';
  }

  if(confirmPassword !== password){
    isValid = false;
    document.getElementById("confirmPassErr").innerHTML = 'Password do not match';
  } else {
    document.getElementById("confirmPassErr").innerHTML = '';
  }
  if(isValid) {
    document.getElementById("signup").submit();
  }
}