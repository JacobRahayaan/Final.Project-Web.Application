<?php
session_start();

if( isset($_SESSION["Login"]) ){
    header("Location: admin.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT id, passw FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($pass, $hashed_password)) {
            $_SESSION["Login"] = true;
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $user;
            echo "Login successful!";
            // Redirect or perform further actions
            header("Location: admin.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login or Admin</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>

    <a href="registrasi.php">Register</a>
</body>
</html>