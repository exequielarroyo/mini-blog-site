<?php
include "components/header.php";

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $users_id = $_SESSION['users_id'];

    $result = mysqli_query($connection, "INSERT INTO posts (title, content, users_id) VALUES ('$title', '$content', '$users_id');");

    header('Location: index.php');
    exit;
}
?>

<div class="d-flex justify-content-center align-content-center">

    <div class="card p-2 w-50 my-4">

        <h2>Create a Post</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="content" placeholder="Input your content here."></textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="index.php" class="btn btn-secondary ">Cancel</a>
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>

    </div>

</div>

<?php include "components/footer.php"; ?>