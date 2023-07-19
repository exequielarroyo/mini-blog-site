<?php include "components/header.php";

$errors = array();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email' AND password='$password';");

    if (mysqli_num_rows($result)) {
        // Store the login state in the session
        $user = mysqli_fetch_array($result);
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['users_id'] = $user['id'];

        header('Location: index.php');
        exit;
    } else {
        // Invalid email or password
        array_push($errors, "Invalid email or password");
    }
}
?>
<div class="d-flex flex-column">
    <h1 class="text-center ">Login</h1>

    <div class="d-flex justify-content-center align-content-center">

        <div class="card p-3 w-50 my-4">
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
            <form action="" method="POST" autocomplete="off">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com"
                        required value="<?php if (!empty($username)) {
                            echo $username;
                        } ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">LOGIN</button>
                <a href="registration.php" class="btn btn-link">REGISTRATION</a>
            </form>

            <p>Currently logged out.</p>

        </div>
    </div>
</div>

<?php include 'components/footer.php' ?>