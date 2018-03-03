<?php include 'view/header.php'; ?>
<main>
    
    <p><a href=".?action=register">Create</a> an account to save all your information or login to
        view what you have already created.</p>
    
    <br><br>
  <form action="" method="post">
            <!--for the control-->
            <input type="hidden" name="action" value="user">

            <label>User Name</label>
            <input type="text" name="userName"> <br>
            <label>Password</label>
            <input type="password" name="password"> <br>

            <input type="submit" value="Login">
    <br><br>
</main>

<?php include 'view/footer.php'; ?>

