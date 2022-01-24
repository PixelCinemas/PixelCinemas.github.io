var totalPrice = 0.0;

var list = [];
var qty = 0;
var amt = 0.0;

function initialise() {
  document.getElementById("ticket_adult").style.display = "none";
  document.getElementById("payBtn").style.display = "none";
}

function updateTable() {
  qty = list.length;
  amt = qty * 5;

  if (qty) {
    document.getElementById("none_selected").style.display = "none";
    document.getElementById("payBtn").style.display = "";
    document.getElementById("ticket_adult").style.display = "";
  } else {
    document.getElementById("none_selected").style.display = "";
    document.getElementById("payBtn").style.display = "none";
    document.getElementById("ticket_adult").style.display = "none";
  }

  document.getElementById("ticket_qty").innerHTML = qty;
  document.getElementById("ticket_amt").innerHTML = "$" + amt.toFixed(2);
  document.getElementById("ticket_total").innerHTML = "$" + amt.toFixed(2);
  document.getElementById("seats").value = list;
  document.getElementById("total").value = amt.toFixed(2);
}

function seat(btn) {
  // document.getElementById(seatNo).textContent =
  // "<input type='image' src='Media/seat_selected.svg' style = 'width:20px;' onclick='seat(" +
  // seatNo +
  // ")'/>";
  var seatNo = btn.id;
  if (btn.getAttribute("src") == "Media/seat.svg") {
    btn.src = "Media/seat_selected.svg";
    list.push(seatNo);
    updateTable();
  } else {
    btn.src = "Media/seat.svg";
    list.splice(list.indexOf(seatNo), 1);
    updateTable();
  }
  console.log(list);
}

function submitForm() {
  document.getElementById("form").submit();
  // console.log("Hi");
}
