<?php include 'view/header.php'; ?>
<main>
    <br>
    <p>Welcome <?php echo htmlspecialchars("$fName $lName") ?></p>
    <br>
    <p><a href=".?action=logout">Logout</a></p>
</main>
<?php include 'view/footer.php'; ?>