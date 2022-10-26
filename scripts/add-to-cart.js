function AddToCart(id) {
  console.log(id);
  const addBtn = document.getElementById(`addBtn_${id}`);

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    addBtn.innerHTML = "Added";
    addBtn.disabled = true;
  }
  xhttp.open("GET", `add-to-cart.php?add=${id}`);
  xhttp.send();
}