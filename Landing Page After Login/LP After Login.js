// Show spinner for exactly 1 second
setTimeout(() => {
    const spinner = document.getElementById("loadingSpinner");
    spinner.classList.add("fade-out");

    // Remove spinner from DOM after fade-out
    setTimeout(() => {
      spinner.style.display = "none";
    }, 500); // Matches fade-out duration
  }, 1000); // 1-second delay

  // Form submission
  const form = document.getElementById('bookingForm');
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    try {
      const response = await fetch(form.action, {
        method: form.method,
        body: formData,
      });
      const result = await response.text();
      if (result === "Success") {
        alert("Submitted successfully!");
        form.reset();
      } else {
        alert("Something went wrong. Please try again.");
      }
    } catch (error) {
      alert("An error occurred: " + error.message);
    }
  });




  
