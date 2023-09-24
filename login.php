<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('db.php');

    $username = $_POST["username"];

    $sql = "SELECT id, username FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $username);
        $stmt->fetch();
        $_SESSION['user_id'] = $user_id;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <input type="submit" value="Login">
        <a href="register.php">Click here to sign up</a>
    </form>
</div>
</body>
</html>
