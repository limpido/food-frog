let validPwd = false, validConfirmPwd = false;
const submitBtn = document.getElementById("submitBtn");
submitBtn.disabled = true;

const pwdNode = document.getElementById("pwd");
const confirmPwdNode = document.getElementById("cpwd");

function updateSubmitBtn() {
  console.log(validPwd, validConfirmPwd)
  submitBtn.disabled = !validPwd || !validConfirmPwd;
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