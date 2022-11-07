updatePlaceOrderButtonState();

function increaseCount(id, price) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", `add-to-cart.php?add=${id}`);
  xhttp.send();

  const countNode = document.getElementById(`count_${id}`);
  cart[id] += 1;
  countNode.innerHTML = cart[id];
  updateSubtotal(id, price, increase=true);
  updateTotal(price, increase=true);
}

function decreaseCount(id, price) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", `add-to-cart.php?remove=${id}`);
  xhttp.send();

  const countNode = document.getElementById(`count_${id}`);
  cart[id] -= 1;
  if (cart[id] === 0) {
    delete cart[id];
    const itemNode = document.getElementById(`item_${id}`);
    itemNode.remove();
    updatePlaceOrderButtonState();
  } else {
    countNode.innerHTML = cart[id];
    updateSubtotal(id, price, increase=false);
  }
  updateTotal(price, increase=false);
}

function updateSubtotal(id, price, increase) {
  const subtotalNode = document.getElementById(`subtotal_${id}`);
  let subtotal = Number(subtotalNode.innerHTML.slice(1));
  if (increase) {
    subtotal += price;
  } else {
    subtotal -= price;
  }
  subtotalNode.innerHTML = '$' + subtotal.toFixed(2);
}

function updateTotal(price, increase) {
  const totalNode = document.getElementById("total");
  const hiddenTotal = document.getElementById("hiddenTotal");
  let total = Number(totalNode.innerHTML.slice(1));
  if (increase) {
    total += price;
  } else {
    total -= price;
  }
  totalNode.innerHTML = '$' + total.toFixed(2);
  hiddenTotal.value = total;
}

function updatePlaceOrderButtonState() {
  const btn = document.getElementById("placeOrderBtn");
  if (!cart || Object.keys(cart).length === 0) {
    btn.disabled = true;
  } else {
    btn.disabled = false;
  }
}