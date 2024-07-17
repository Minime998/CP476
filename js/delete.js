// hide query results message when user clicks on form again
const inputElements = document.querySelectorAll(".input-field");
inputElements.forEach((element) => {
  element.addEventListener("click", () => {
    const failedMessage = document.querySelector(".failed-query");
    const successMessage = document.querySelector(".successful-query");
    if (failedMessage !== null) {
      failedMessage.style.display = "none";
    }
    if (successMessage !== null) {
      successMessage.style.display = "none";
    }
  });
});
