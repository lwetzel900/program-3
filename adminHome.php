<?php include 'view/header.php'; ?>
<main>

    <p><?php echo $errorMessage; ?></p>

    <form action="" method="post" id="aligned">
        <!--for the control-->
        <input type="hidden" name="action" value="admin">

        <label>Password:</label>
        <input type="password" name="password"> <br>

        <label>&nbsp;</label>
        <input type="submit" value="Login"><br>

    </form>

    <br><br>
</main>

<?php include 'view/footer.php'; ?>

