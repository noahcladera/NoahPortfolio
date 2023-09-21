(function () {
    [...document.querySelectorAll(".control")].forEach(button => {
        button.addEventListener("click", function() {
            document.querySelector(".active-btn").classList.remove("active-btn");
            this.classList.add("active-btn");
            document.querySelector(".active").classList.remove("active");
            document.getElementById(button.dataset.id).classList.add("active");
        })
    });
    document.querySelector(".theme-btn").addEventListener("click", () => {
        document.body.classList.toggle("light-mode");
    })
})();

document.querySelector(".contact-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting the traditional way

    // You can add additional validation here if needed

    // Perform an AJAX request to submit the form data
    fetch("process_contact.php", {
        method: "POST",
        body: new FormData(this),
    })
        .then((response) => response.text())
        .then((data) => {
            // Display a success message or handle errors
            console.log(data); // You can replace this with your desired action
            
            // Clear the form fields
            this.reset();
            
            // Add a CSS class to the submit button
            document.querySelector(".submit-btn").classList.add("active-btn");
            
            // Display a confirmation message
            const confirmationMessage = document.querySelector(".confirmation-message");
            confirmationMessage.textContent = "Your message has been sent!";
            confirmationMessage.style.display = "block";
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});
