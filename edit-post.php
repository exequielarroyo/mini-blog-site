<?php
include "components/header.php";

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $result = mysqli_query($connection, "UPDATE posts SET title='$title', content='$content';");

    header('Location: index.php');
    exit;
} else {
    $posts_id = $_GET['id'];
    $result = mysqli_query($connection, "SELECT * FROM posts WHERE id='$posts_id';");
    $post = mysqli_fetch_array($result);
}
?>

<div class="d-flex justify-content-center align-content-center">

    <div class="card p-2 w-50 my-4">

        <h2>Update a Post</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                    value="<?php echo $post['title'] ?>">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="content"
                    placeholder="Input your content here."><?php echo $post['content'] ?></textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="index.php" class="btn btn-secondary ">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>

</div>

<?php include "components/footer.php"; ?>