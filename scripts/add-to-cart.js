function AddToCart(id) {
  const addBtn = document.getElementById(`addBtn_${id}`);

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    if (this.status === 200) {
      addBtn.innerHTML = "Added";
      addBtn.disabled = true;
    } else if (this.status === 400) {
      alert("You are not allowed to add items from multiple stores to the shopping cart, please empty your shopping cart first.")
    }
  }
  xhttp.open("GET", `add-to-cart.php?add=${id}`);
  xhttp.send();
}