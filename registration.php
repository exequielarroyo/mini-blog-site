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

<div class="d-flex justify-content-center align-content-center">

    <div class="card p-2 w-50 my-4">
        <h1>Registration</h1>
        <h2>See the Registration Rules</h2>

        <form action="registration.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Adress</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="confirm_password" class="form-control" id="confirm_password" name="confirm_password"
                    placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-primary ">Register</button>

        </form>

        <p>Return to the <a href="index.php">LOGIN PAGE</a>.</p>
    </div>
</div>

<?php include 'components/footer.php' ?>