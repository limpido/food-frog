let validReview = false;
const submitBtn = document.getElementById("submit");
submitBtn.disabled = true;

const reviewNode = document.getElementById("reviewInput");

function updateSubmitBtn() {
  console.log(reviewNode.value);
  if (reviewNode.value.trim().length) {
    validReview = true;
  } else {
    validReview = false;
  }
  submitBtn.disabled = !validReview;
}