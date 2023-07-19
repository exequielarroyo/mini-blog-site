<?php
include "components/header.php";

if (isset($_GET['delete_id'])) {
    $posts_id = $_GET['delete_id'];

    mysqli_query($connection, "DELETE FROM posts WHERE id='$posts_id';");
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $users_id = $_SESSION['users_id'];
    $result = mysqli_query($connection, "SELECT * FROM posts WHERE users_id = '$users_id' ORDER BY id DESC;");
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $result = mysqli_query($connection, "SELECT * FROM posts ORDER BY id DESC;");
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

<div class="container my-4 ">

    <div class="card p-2 w-100 mb-3">
        <?php
        if (isset($_SESSION['loggedin'])) {
            ?>
            <a href="create-post.php" class="btn btn-link">Create new post.</a>
            <?php
        } else {
            ?>
            <p><a href="register.php">Sign up</a> to create a post.</p>
            <?php
        }
        ?>
    </div>


    <div class="d-flex flex-column gap-2 ">

        <?php
        foreach ($posts as $item): ?>
            <div class="card p-2 w-100 ">

                <?php echo $item['title'] ?>
                <div class="text-secondary mt-2">
                    <?php echo $item['content'] ?>
                </div>
                <?php

                if (isset($_SESSION['loggedin'])) {
                    ?>
                    <div class="d-flex justify-content-end  gap-2">
                        <a href="index.php?delete_id=<?php echo $item['id'] ?>" class="btn btn-danger ">Delete</a>
                        <a href="edit-post.php?id=<?php echo $item['id'] ?>" class="btn btn-success ">Edit</a>
                    </div>
                    <?php
                }
                ?>

            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php include 'components/footer.php' ?>