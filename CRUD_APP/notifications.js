function errorNotification() {
  toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: true,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "500",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  };
  Command: toastr["error"](
    "No data provided to be added/updated.",
    "Empty Data"
  );
}

function confirm_delete(id) {
  let del = confirm("Do you want to delete the user ?");
  console.log(del);
  if (del == true) {
    window.location.href = "index.php?action=del&&id=" + id;
  }
}

function edit(id) {
  window.location.href = "create.php?action=edit&&id=" + id;
}
