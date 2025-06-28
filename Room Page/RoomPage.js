// Show spinner for exactly 1 second
setTimeout(() => {
    const spinner = document.getElementById("loadingSpinner");
    spinner.classList.add("fade-out");

    // Remove spinner from DOM after fade-out
    setTimeout(() => {
      spinner.style.display = "none";
    }, 500); // Matches fade-out duration
  }, 1000); // 1-second delay


