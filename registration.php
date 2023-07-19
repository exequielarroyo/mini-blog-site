<?php
include "components/header.php";

$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email';");
    $users = mysqli_fetch_array($result);
    if (count($users) !== 0) {
        array_push($errors, "Email is already registered.");
    }


    if ($password !== $confirm_password) {
        array_push($errors, "Password did not match.");
    }

    if (count($errors) === 0) {
        $result = mysqli_query($connection, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password');");
        header('Location: login.php');
        exit;
    }
}
?>

<div class="d-flex flex-column">
    <h1 class="text-center ">Registration</h1>
    <div class="d-flex justify-content-center align-content-center">
        <div class="card p-3 w-50 my-4">
            <h2>See the Registration Rules</h2>
            <?php
            if (count($errors) !== 0) {
                ?>
                <div class="alert alert-danger " role="alert">
                    <?php
                    foreach ($errors as $error) {
                        echo $error;
                    }
                    ?>
                </div>
                <?php
            }
            ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                        required value="<?php if (!empty($username)) {
                            echo $username;
                        } ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Adress</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com"
                        required value="<?php if (!empty($email)) {
                            echo $email;
                        } ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                </div>
                <div class="mb-3 ">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Confirm Password" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ">REGISTER</button>

            </form>

            <p>Return to the <a href="login.php">LOGIN PAGE</a>.</p>
        </div>
    </div>
</div>

<?php include 'components/footer.php' ?>