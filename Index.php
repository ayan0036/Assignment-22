 <?php
require_once "db.php"; // DB connection import

$feedback = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name   = trim($_POST["name"]);
    $email  = trim($_POST["email"]);
    $course = trim($_POST["course"]);

    if ($name == "" || $email == "" || $course == "") {
        $feedback = "⚠️ Sab fields bharna zaroori hai!";
    } else {
        $stmt = $conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $course);

        if ($stmt->execute()) {
            $feedback = "✅ Data stored successfully!";
        } else {
            $feedback = "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Registration</title>
</head>
<body>
  <h2>Student Registration Form</h2>

  <?php if ($feedback) echo "<p>$feedback</p>"; ?>

  <form method="post">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Course:</label><br>
    <input type="text" name="course" required><br><br>

    <input type="submit" value="Register">
  </form>
</body>
</html>
