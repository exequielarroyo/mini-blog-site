<?php
include "components/header.php";

if (isset($_GET['delete_id'])) {
    $posts_id = $_GET['delete_id'];

    mysqli_query($connection, "DELETE FROM posts WHERE id='$posts_id';");
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $email = "zekielarroyo@gmail.com";
    $password = "admin123";
    $result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email' AND password='$password';");

    if (mysqli_num_rows($result)) {
        // Store the login state in the session
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;

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
?>

<div class="container my-4 ">
    <div class="card p-2 w-100 mb-3">
        <a href="create-post.php" class="btn btn-link">Create new post.</a>
    </div>

    <div class="d-flex flex-column gap-2 ">

        <?php
        foreach ($posts as $item): ?>
            <div class="card p-2 w-100 ">
                <?php echo $item['title'] ?>
                <div class="text-secondary mt-2">
                    <?php echo $item['content'] ?>
                </div>
                <div class="d-flex justify-content-end  gap-2">
                    <a href="index.php?delete_id=<?php echo $item['id'] ?>" class="btn btn-danger ">Delete</a>
                    <a href="edit-post.php?id=<?php echo $item['id'] ?>" class="btn btn-success ">Edit</a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<?php include 'components/footer.php' ?>