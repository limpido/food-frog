function increaseCount(id, price) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", `add-to-cart.php?add=${id}`);
  xhttp.send();

  const countNode = document.getElementById(`count_${id}`);
  let count = Number(countNode.innerHTML);
  countNode.innerHTML = count+1;
  updateSubtotal(id, price, increase=true);
  updateTotal(price, increase=true);
}

function decreaseCount(id, price) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", `add-to-cart.php?remove=${id}`);
  xhttp.send();

  const countNode = document.getElementById(`count_${id}`);
  let count = Number(countNode.innerHTML);
  count -= 1;
  if (count === 0) {
    const containerNode = document.getElementsByClassName("container")[0];
    const itemNode = document.getElementById(`item_${id}`);
    itemNode.remove();
  } else {
    countNode.innerHTML = count;
    updateSubtotal(id, price, increase=false);
    updateTotal(price, increase=false);
  }
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
  let total = Number(totalNode.innerHTML.slice(1));
  if (increase) {
    total += price;
  } else {
    total -= price;
  }
  totalNode.innerHTML = '$' + total.toFixed(2);
}