function AddToCart(id) {
  const addBtns = document.getElementsByClassName(`addBtn_${id}`);

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    if (this.status === 200) {
      for (let i=0; i<addBtns.length; i++) {
        addBtns[i].innerHTML = "Added";
        addBtns[i].disabled = true;
      }
    } else if (this.status === 400) {
      alert("You are not allowed to add items from multiple stores to the shopping cart, please empty your shopping cart first.")
    } else if (this.status === 401) {
      alert("Please log in to use this functionality.");
    }
  }
  xhttp.open("GET", `add-to-cart.php?add=${id}`);
  xhttp.send();
}