let validEmail = false, validPwd = false;
const submitBtn = document.getElementById("submitBtn");
submitBtn.disabled = true;

const emailNode = document.getElementById("email");
const pwdNode = document.getElementById("pwd");


function updateSubmitBtn() {
  submitBtn.disabled = !validEmail || !validPwd;
}

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
  if (!pwd.length) {
    validPwd = false;
    alert("Please fill in your password.");

    pwdNode.focus();
    pwdNode.select();
    pwdNode.style.border = "2px solid red";
  } else {
    validPwd = true;
    pwdNode.style.border = "1px solid #DADCE0";
  }
  updateSubmitBtn();
}