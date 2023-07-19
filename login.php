<?php include "components/header.php";

session_start();
// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Redirect to the authenticated page
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // TODO: Validate the username and password against your user database

    // For the sake of demonstration, let's assume the login is successful
    if ($email === 'zekielarroyo@gmail.com' && $password === 'admin123') {
        // Store the login state in the session
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;

        // Redirect to the authenticated page
        header('Location: index.php');
        exit;
    } else {
        // Invalid username or password
        echo 'Invalid username or password.';
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