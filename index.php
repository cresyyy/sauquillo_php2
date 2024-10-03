<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>

        <form method="POST">
            <p>Username:
            <input type="text" name="uname" size="15" maxlength="30"></p>
            <p>Password:
            <input type="password" name="pword"></p>

            <p><input type="submit" name="submitBtn" value="Submit"></p>
            <p><input type="submit" name="logoutBtn" value="Logout"></p>
        </form>
   

        <?php

session_start();


if (isset($_POST['logoutBtn'])) {

    session_unset();
    session_destroy();

}

// Handle login if the user submits the form
if (isset($_POST["submitBtn"])) {
    $a = $_POST['uname'];
    $b = $_POST['pword'];

   
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        // If a user is already logged in, show a message and don't allow new login
        echo "<p>{$_SESSION['username']} is already logged in. Wait for him to log out.</p>";
    } else {

        if (!empty($a) && !empty($b)) {
            // Hashed password so it will not show the real password the user entered.
            $hashedPassword = password_hash($b, PASSWORD_DEFAULT);

            $_SESSION['username'] = $a;
            $_SESSION['password'] = $hashedPassword;

            
            echo "<h2>User logged in: {$a}</h2>";
            echo "<h2>Password: {$hashedPassword}</h2>";
        } else {
            echo "<h2>Please enter a valid username and password.</h2>";
        }
    }
}
?>


</body>
</html>
