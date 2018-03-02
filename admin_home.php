<?php include 'view/header.php'; ?>
<main>
    <br><br>
  <form action="" method="post">
            <!--for the control-->
            <input type="hidden" name="action" value="admin_home">

            <label>User Name</label>
            <input type="text" name="userName"> <br>
            <label>Password</label>
            <input type="password" name="password"> <br>

            <input type="submit" value="Login">
    <br><br>
</main>

<?php include 'view/footer.php'; ?>


