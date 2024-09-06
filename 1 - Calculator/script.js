let previous_op = "";
const display = document.querySelector("#display");

function appendToDisplay(value) {
  if (
    previous_op == "+" ||
    previous_op == "-" ||
    previous_op == "*" ||
    previous_op == "/"
  ) {
    if (value == "+" || value == "-" || value == "*" || value == "/") {
      return;
    }
  }
  previous_op = value;
  display.value += value;
}

function clearDisplay(value) {
  previous_op = value;
  display.value = "";
}

document.getElementById("calcForm").onsubmit = function (event) {
  event.preventDefault(); // Prevent the form from submitting the traditional way

  /* An XMLHttpRequest is used to send the form data to process.php asynchronously (AJAX). */
  const formData = new FormData(this);
  const xhr = new XMLHttpRequest();

  xhr.open(
    "GET",
    "logic.php?" + new URLSearchParams(formData).toString(),
    true
  );

  xhr.onload = function () {
    if (xhr.status === 200) {
      document.getElementById("display").value = xhr.responseText;
    }
  };

  xhr.send();
};
