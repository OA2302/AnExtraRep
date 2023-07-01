function validateForm() {
    var name = document.getElementById("name").value;
    var age = document.getElementById("age").value;
    var weight = document.getElementById("weight").value;
    var email = document.getElementById("email").value;
    var healthReport = document.getElementById("health-report").value;
    // Check if all fields are filled
    if (name == "" || age == "" || weight == "" || email == "" || healthReport == "") {
      alert("Please fill all fields");
      return false;
    }
    // Check if the email address is valid
    if (!validateEmail(email)) {
      alert("Please enter a valid email address");
      return false;
    }
    // Check if the health report file is a PDF file
    if (!validatePdf(healthReport)) {
      alert("Please upload a PDF file");
      return false;
    }
    return true;
  }
  function validateEmail(email) {
    var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,})$/;
    return re.test(email);
  }
  function validatePdf(file) {
    var ext = file.split(".")[1];
    if (ext != "pdf") {
      return false;
    }
    return true;
  }
