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

// Show query resutls message when use clicks submit button
// document.querySelector(".submit-btn").addEventListener("click", (e) => {
//   const MessageContainer = document.querySelector(".query-results");
//   setTimeout(function () {
//     MessageContainer.style.display = "block";
//   }, 100);
// });
