<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "health_report");
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
// Get the form data
$name = $_POST["name"];
$age = $_POST["age"];
$weight = $_POST["weight"];
$email = $_POST["email"];
$health_report = $_FILES["health-report"]["name"];
// Upload the health report file to the server
$target_dir = "uploads/";
$target_file = $target_dir . basename($health_report);
move_uploaded_file($_FILES["health-report"]["tmp_name"], $target_file);
// Insert the data into the database
$sql = "INSERT INTO health_reports (name, age, weight, email, health_report) VALUES ('$name', '$age', '$weight', '$email', '$health_report')";
mysqli_query($conn, $sql);
// Close the connection
mysqli_close($conn);
// Redirect to the thank you page
header("Location: thank-you.php");
?>


<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "health_report");
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
// Get the email from the URL
$email = $_GET["email"];
// Get the health report file from the database
$sql = "SELECT health_report FROM health_reports WHERE email='$email'";
$result = mysqli_query($conn, $sql);
// Check if the health report file exists
if (mysqli_num_rows($result) > 0) {
// Get the health report file
$row = mysqli_fetch_assoc($result);
};
?>