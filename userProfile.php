<?php include 'view/header.php'; ?>
<main>
    <br>
    <p>Welcome <?php echo htmlspecialchars("$fName $lName") ?></p><br>

    <p>You haven't picked out anything yet...</p><br>
        <p>Please click options to choose your venue and services</p><br>
   
        

    <p><a href=".?action=showOptions">options</a></p>
    <p><a href=".?action=logout">Logout</a></p>
</main>
<?php include 'view/footer.php'; ?>