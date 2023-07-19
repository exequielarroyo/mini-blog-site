<?php
include "components/header.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $result = mysqli_query($connection, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password');");
}



    ?>
<h1>Registration</h1>
<h2>See the Registration Rules</h2>

<form action="registration.php" method="POST">

    <input type="text" name="username" placeholder="Username" />
    <input type="email" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="Password" />
    <input type="confirm_password" name="confirm_password" placeholder="Confirm Password" />

    <button type="submit">Register</button>

</form>

<p>Return to the <a href="index.php">LOGIN PAGE</a>.</p>

<?php include 'components/footer.php' ?>