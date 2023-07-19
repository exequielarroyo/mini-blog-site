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

    <div class="card p-2 w-50 ">

        <h2>Login</h2>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Enter Email">
            <input type="password" name="password" placeholder="Enter Password">
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <a href="registration.php">registration</a>

        <p>Currently logged out.</p>

    </div>
</div>

<?php include 'components/footer.php' ?>