document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault();
  
    const formData = new FormData(this);
  
    fetch("contact.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        const responseMessage = document.getElementById("responseMessage");
        if (data.status === "success") {
          responseMessage.innerHTML =
            '<div class="alert alert-success">' + data.message + "</div>";
          document.getElementById("contactForm").reset();
        } else {
          responseMessage.innerHTML =
            '<div class="alert alert-danger">' + data.message + "</div>";
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        document.getElementById("responseMessage").innerHTML =
          '<div class="alert alert-danger">An error occurred. Please try again later.</div>';
      });
  });
  