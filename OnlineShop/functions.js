function confirm_delete(id) {
  let del = confirm("Do you want to delete the product ?");
  console.log(del);
  if (del == true) {
    window.location.href = "delete.php?id=" + id;
  }
}
