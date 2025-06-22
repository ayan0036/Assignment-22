 <?php
$servername = "localhost";
$username = "root";  // XAMPP default
$password = "";      // by default blank hota hai
$dbname = "webteam_intern";

// MySQL se connect
$conn = new mysqli($servername, $username, $password, $dbname);

// Connection error check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
