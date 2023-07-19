<?php include "components/header.php"; ?>

<header>
    <h1>MiniBlog</h1>
</header>
<form action="home.php" method="POST">
    <input type="email" name="email" placeholder="Enter Email">
    <input type="password" name="password" placeholder="Enter Password">
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<a href="registration.php">registration</a>

<p>Currently logged out.</p>

<?php include 'components/footer.php' ?>