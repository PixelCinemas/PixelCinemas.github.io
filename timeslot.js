var date = "";
var time = "";
var cinema = "";
var firstClick = true;

function initialise() {
  date = document.getElementById("dayOneBtn").innerText;
  console.log(date);
  if (document.getElementById("NP21")) {
    document.getElementById("NP21").style.display = "none";
  }
  if (document.getElementById("NP22")) {
    document.getElementById("NP22").style.display = "none";
  }
  if (document.getElementById("NP23")) {
    document.getElementById("NP23").style.display = "none";
  }
  if (document.getElementById("NP31")) {
    document.getElementById("NP31").style.display = "none";
  }
  if (document.getElementById("NP32")) {
    document.getElementById("NP32").style.display = "none";
  }
  if (document.getElementById("NP33")) {
    document.getElementById("NP33").style.display = "none";
  }
  if (document.getElementById("BM21")) {
    document.getElementById("BM21").style.display = "none";
  }
  if (document.getElementById("BM22")) {
    document.getElementById("BM22").style.display = "none";
  }
  if (document.getElementById("BM23")) {
    document.getElementById("BM23").style.display = "none";
  }
  if (document.getElementById("BM31")) {
    document.getElementById("BM31").style.display = "none";
  }
  if (document.getElementById("BM32")) {
    document.getElementById("BM32").style.display = "none";
  }
  if (document.getElementById("BM33")) {
    document.getElementById("BM33").style.display = "none";
  }
  if (document.getElementById("WG21")) {
    document.getElementById("WG21").style.display = "none";
  }
  if (document.getElementById("WG22")) {
    document.getElementById("WG22").style.display = "none";
  }
  if (document.getElementById("WG23")) {
    document.getElementById("WG23").style.display = "none";
  }
  if (document.getElementById("WG31")) {
    document.getElementById("WG31").style.display = "none";
  }
  if (document.getElementById("WG32")) {
    document.getElementById("WG32").style.display = "none";
  }
  if (document.getElementById("WG33")) {
    document.getElementById("WG33").style.display = "none";
  }
}

function updateForm() {
  document.getElementById("date").value = date;
  document.getElementById("time").value = time;
  document.getElementById("cinema").value = cinema;
}

function clickDay(btn) {
  if (btn.classList.contains("unselectDayBtn")) {
    var elements = document.getElementsByClassName("selectDayBtn");
    for (var i = 0; i < elements.length; i++) {
      elements[i].classList.add("unselectDayBtn");
      elements[i].classList.remove("selectDayBtn");
    }
    btn.classList.remove("unselectDayBtn");
    btn.classList.add("selectDayBtn");
    date = btn.innerText;
  }
  if (btn.id == "dayOneBtn") {
    if (document.getElementById("NP11")) {
      document.getElementById("NP11").style.display = "";
    }
    if (document.getElementById("NP12")) {
      document.getElementById("NP12").style.display = "";
    }
    if (document.getElementById("NP13")) {
      document.getElementById("NP13").style.display = "";
    }
    if (document.getElementById("NP21")) {
      document.getElementById("NP21").style.display = "none";
    }
    if (document.getElementById("NP22")) {
      document.getElementById("NP22").style.display = "none";
    }
    if (document.getElementById("NP23")) {
      document.getElementById("NP23").style.display = "none";
    }
    if (document.getElementById("NP31")) {
      document.getElementById("NP31").style.display = "none";
    }
    if (document.getElementById("NP32")) {
      document.getElementById("NP32").style.display = "none";
    }
    if (document.getElementById("NP33")) {
      document.getElementById("NP33").style.display = "none";
    }

    if (document.getElementById("BM11")) {
      document.getElementById("BM11").style.display = "";
    }
    if (document.getElementById("BM12")) {
      document.getElementById("BM12").style.display = "";
    }
    if (document.getElementById("BM13")) {
      document.getElementById("BM13").style.display = "";
    }
    if (document.getElementById("BM21")) {
      document.getElementById("BM21").style.display = "none";
    }
    if (document.getElementById("BM22")) {
      document.getElementById("BM22").style.display = "none";
    }
    if (document.getElementById("BM23")) {
      document.getElementById("BM23").style.display = "none";
    }
    if (document.getElementById("BM31")) {
      document.getElementById("BM31").style.display = "none";
    }
    if (document.getElementById("BM32")) {
      document.getElementById("BM32").style.display = "none";
    }
    if (document.getElementById("BM33")) {
      document.getElementById("BM33").style.display = "none";
    }

    if (document.getElementById("WG11")) {
      document.getElementById("WG11").style.display = "";
    }
    if (document.getElementById("WG12")) {
      document.getElementById("WG12").style.display = "";
    }
    if (document.getElementById("WG13")) {
      document.getElementById("WG13").style.display = "";
    }
    if (document.getElementById("WG21")) {
      document.getElementById("WG21").style.display = "none";
    }
    if (document.getElementById("WG22")) {
      document.getElementById("WG22").style.display = "none";
    }
    if (document.getElementById("WG23")) {
      document.getElementById("WG23").style.display = "none";
    }
    if (document.getElementById("WG31")) {
      document.getElementById("WG31").style.display = "none";
    }
    if (document.getElementById("WG32")) {
      document.getElementById("WG32").style.display = "none";
    }
    if (document.getElementById("WG33")) {
      document.getElementById("WG33").style.display = "none";
    }
  } else if (btn.id == "dayTwoBtn") {
    if (document.getElementById("NP11")) {
      document.getElementById("NP11").style.display = "none";
    }
    if (document.getElementById("NP12")) {
      document.getElementById("NP12").style.display = "none";
    }
    if (document.getElementById("NP13")) {
      document.getElementById("NP13").style.display = "none";
    }
    if (document.getElementById("NP21")) {
      document.getElementById("NP21").style.display = "";
    }
    if (document.getElementById("NP22")) {
      document.getElementById("NP22").style.display = "";
    }
    if (document.getElementById("NP23")) {
      document.getElementById("NP23").style.display = "";
    }
    if (document.getElementById("NP31")) {
      document.getElementById("NP31").style.display = "none";
    }
    if (document.getElementById("NP32")) {
      document.getElementById("NP32").style.display = "none";
    }
    if (document.getElementById("NP33")) {
      document.getElementById("NP33").style.display = "none";
    }

    if (document.getElementById("BM11")) {
      document.getElementById("BM11").style.display = "none";
    }
    if (document.getElementById("BM12")) {
      document.getElementById("BM12").style.display = "none";
    }
    if (document.getElementById("BM13")) {
      document.getElementById("BM13").style.display = "none";
    }
    if (document.getElementById("BM21")) {
      document.getElementById("BM21").style.display = "";
    }
    if (document.getElementById("BM22")) {
      document.getElementById("BM22").style.display = "";
    }
    if (document.getElementById("BM23")) {
      document.getElementById("BM23").style.display = "";
    }
    if (document.getElementById("BM31")) {
      document.getElementById("BM31").style.display = "none";
    }
    if (document.getElementById("BM32")) {
      document.getElementById("BM32").style.display = "none";
    }
    if (document.getElementById("BM33")) {
      document.getElementById("BM33").style.display = "none";
    }

    if (document.getElementById("WG11")) {
      document.getElementById("WG11").style.display = "none";
    }
    if (document.getElementById("WG12")) {
      document.getElementById("WG12").style.display = "none";
    }
    if (document.getElementById("WG13")) {
      document.getElementById("WG13").style.display = "none";
    }
    if (document.getElementById("WG21")) {
      document.getElementById("WG21").style.display = "";
    }
    if (document.getElementById("WG22")) {
      document.getElementById("WG22").style.display = "";
    }
    if (document.getElementById("WG23")) {
      document.getElementById("WG23").style.display = "";
    }
    if (document.getElementById("WG31")) {
      document.getElementById("WG31").style.display = "none";
    }
    if (document.getElementById("WG32")) {
      document.getElementById("WG32").style.display = "none";
    }
    if (document.getElementById("WG33")) {
      document.getElementById("WG33").style.display = "none";
    }
  } else if (btn.id == "dayThreeBtn") {
    if (document.getElementById("NP11")) {
      document.getElementById("NP11").style.display = "none";
    }
    if (document.getElementById("NP12")) {
      document.getElementById("NP12").style.display = "none";
    }
    if (document.getElementById("NP13")) {
      document.getElementById("NP13").style.display = "none";
    }
    if (document.getElementById("NP21")) {
      document.getElementById("NP21").style.display = "none";
    }
    if (document.getElementById("NP22")) {
      document.getElementById("NP22").style.display = "none";
    }
    if (document.getElementById("NP23")) {
      document.getElementById("NP23").style.display = "none";
    }
    if (document.getElementById("NP31")) {
      document.getElementById("NP31").style.display = "";
    }
    if (document.getElementById("NP32")) {
      document.getElementById("NP32").style.display = "";
    }
    if (document.getElementById("NP33")) {
      document.getElementById("NP33").style.display = "";
    }

    if (document.getElementById("BM11")) {
      document.getElementById("BM11").style.display = "none";
    }
    if (document.getElementById("BM12")) {
      document.getElementById("BM12").style.display = "none";
    }
    if (document.getElementById("BM13")) {
      document.getElementById("BM13").style.display = "none";
    }
    if (document.getElementById("BM21")) {
      document.getElementById("BM21").style.display = "none";
    }
    if (document.getElementById("BM22")) {
      document.getElementById("BM22").style.display = "none";
    }
    if (document.getElementById("BM23")) {
      document.getElementById("BM23").style.display = "none";
    }
    if (document.getElementById("BM31")) {
      document.getElementById("BM31").style.display = "";
    }
    if (document.getElementById("BM32")) {
      document.getElementById("BM32").style.display = "";
    }
    if (document.getElementById("BM33")) {
      document.getElementById("BM33").style.display = "";
    }

    if (document.getElementById("WG11")) {
      document.getElementById("WG11").style.display = "none";
    }
    if (document.getElementById("WG12")) {
      document.getElementById("WG12").style.display = "none";
    }
    if (document.getElementById("WG13")) {
      document.getElementById("WG13").style.display = "none";
    }
    if (document.getElementById("WG21")) {
      document.getElementById("WG21").style.display = "none";
    }
    if (document.getElementById("WG22")) {
      document.getElementById("WG22").style.display = "none";
    }
    if (document.getElementById("WG23")) {
      document.getElementById("WG23").style.display = "none";
    }
    if (document.getElementById("WG31")) {
      document.getElementById("WG31").style.display = "";
    }
    if (document.getElementById("WG32")) {
      document.getElementById("WG32").style.display = "";
    }
    if (document.getElementById("WG33")) {
      document.getElementById("WG33").style.display = "";
    }
  }
  console.log(date);
  updateForm();
}

function clickTime(lct, btn) {
  if (firstClick) {
    btn.classList.remove("unselectTimeBtn");
    btn.classList.add("selectTimeBtn");
    firstClick = false;
  } else {
    if (btn.classList.contains("unselectTimeBtn")) {
      var elements = document.getElementsByClassName("selectTimeBtn");
      for (var i = 0; i < elements.length; i++) {
        elements[i].classList.add("unselectTimeBtn");
        elements[i].classList.remove("selectTimeBtn");
      }
      btn.classList.remove("unselectTimeBtn");
      btn.classList.add("selectTimeBtn");
    }
  }

  document.getElementById("nextBtn").style.display = "block";
  time = btn.innerText;
  if (lct == 1) {
    cinema = "NorthPoint PX Max";
  } else if (lct == 2) {
    cinema = "Bedok Mall PX Max";
  } else if (lct == 3) {
    cinema = "WestGate PX Max";
  } else if (lct == 4) {
    cinema = "WestGate Master";
  }

  console.log(time);
  console.log(cinema);

  updateForm();
}

function submitForm() {
  document.getElementById("form").submit();
  // console.log("Hi");
}
