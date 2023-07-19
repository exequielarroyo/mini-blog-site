<?php include "config/database.php";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Blog Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="bg-primary d-flex justify-content-between">
        <h1 class="text-light px-4 py-2">MiniBlog</h1>

        <div class="d-flex">
            <p class="text-light">Hi !</p>
            <a href="index.php" class="btn btn-outline-primary text-light ">Home</a>
            <form action="logout.php" method="post">
                <button type="submit" class="btn btn-outline-primary text-light">Logout</button>
            </form>
        </div>
    </div>