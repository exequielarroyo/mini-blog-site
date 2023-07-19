<?php
include "components/header.php";

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $email = "zekielarroyo@gmail.com";
    $password = "admin123";
    $result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email' AND password='$password';");

    if (mysqli_num_rows($result)) {
        // Store the login state in the session
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;

        echo "Logged in";
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

$users_id = mysqli_fetch_all($result, MYSQLI_ASSOC)[0]['id'];
$result = mysqli_query($connection, "SELECT * FROM posts WHERE users_id = '$users_id';");
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($posts as $item): ?>
    <div>
        <?php echo $item['title'] ?>
        <div class="text-secondary mt-2">
            <?php echo $item['content'] ?>
        </div>
    </div>
<?php endforeach; ?>


<a href="index.php">Logout</a>

<?php include 'components/footer.php' ?>