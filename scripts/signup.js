let validUsername = false, validEmail = false, validPwd = false, validConfirmPwd = false;
const submitBtn = document.getElementById("submitBtn");
submitBtn.disabled = true;

const usernameNode = document.getElementById("username");
const emailNode = document.getElementById("email");
const pwdNode = document.getElementById("pwd");
const confirmPwdNode = document.getElementById("cpwd");


function updateSubmitBtn() {
  submitBtn.disabled = !validUsername || !validEmail || !validPwd || !validConfirmPwd;
}

function validateUsername() {
  const username = usernameNode.value;
  username.trim(); // remove any whitespace from both ends of the string

  const regex = /^[a-zA-Z0-9._]{2,}$/;
  if (username.length < 2 || !regex.test(username)) {
    validUsername = false;
    if (username.length < 2)
      alert("Username should have at least 4 characters.");
    else
      alert(
        "Username has incorrect format, please enter alphanumeric symbols separated with dot or underscore."
      );
    
    usernameNode.focus();
    usernameNode.select();
    usernameNode.style.border = "2px solid red";
  } else {
    validUsername = true;
    usernameNode.style.border = "1px solid #DADCE0";
  }
  updateSubmitBtn();
}

/*
    The email field contains a user name part follows by “@” and a
    domain name part. The user name contains word characters
    including hyphen (“-”) and period (“.”). The domain name contains
    two to four address extensions. Each extension is string of word
    characters and separated from the others by a period (“.”). The last
    extension must have two to three characters.
*/
function validateEmail() {
  const email = emailNode.value;
  email.trim();
  const regex = /^\w+([.-]?\w+)*@(\w+\.){1,3}(\w{2,3})$/;
  if (!email.length || !regex.test(email)) {
    validEmail = false;
    if (!email.length) alert("Please fill in your email.");
    else
      alert(
        "Email entered in wrong format. Please write in xxx@email.com format."
      );

    emailNode.focus();
    emailNode.select();
    emailNode.style.border = "2px solid red";
  } else {
    validEmail = true;
    emailNode.style.border = "1px solid #DADCE0";
  }
  updateSubmitBtn();
}

function validatePwd() {
  const pwd = pwdNode.value;
  pwd.trim();
  const regex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  if (pwd.length < 8 || !regex.test(pwd)) {
    validPwd = false;
    if (pwd.length < 8)
      alert("Please have at least 8 characters in your password.");
    else
      alert(
        "Please include at least 1 uppercase, 1 lowercase, 1 number and 1 special character in your password."
      );

    pwdNode.focus();
    pwdNode.select();
    pwdNode.style.border = "2px solid red";
  } else {
    validPwd = true;
    pwdNode.style.border = "1px solid #DADCE0";
  }
  updateSubmitBtn();
}

function validateConfirmPwd() {
  const cpwd = confirmPwdNode.value;
  const pwd = pwdNode.value;
  cpwd.trim();
  console.log(cpwd, pwd)
  if (validPwd && cpwd === pwd) {
    validConfirmPwd = true;
    confirmPwdNode.style.border = "1px solid #DADCE0";
  } else {
    validConfirmPwd = false;
    confirmPwdNode.focus();
    confirmPwdNode.select();
    confirmPwdNode.style.border = "2px solid red";
  }
  updateSubmitBtn();
}