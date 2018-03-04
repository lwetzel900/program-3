<?php include 'view/header.php'; ?>
<main>
    <br>
    <p><a href=".?action=register">Create</a> an account to save all your information or login to
        view what you have already created.</p>

    <br><br>
    <form action="." method="post" id="aligned">
        <!--for the control-->
        <input type="hidden" name="action" value="user">

        <label>Email Address</label>
        <input type="text" name="email"> <br>
        <label>Password</label>
        <input type="password" name="password"> <br>
        <label>&nbsp;</label>
        <input type="submit" value="Login"><br>
    </form>
    <br><br>
</main>

<?php include 'view/footer.php'; ?>

