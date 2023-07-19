<?php include "components/header.php";

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Redirect to the authenticated page
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
        // Invalid username or password
        echo 'Invalid email or password.';
    }
}
?>

<div class="d-flex justify-content-center align-content-center">

    <div class="card p-2 w-50 my-4">

        <h2>Login</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <a href="registration.php">registration</a>
        <p>Currently logged out.</p>

    </div>

</div>

<?php include 'components/footer.php' ?>