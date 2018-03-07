<?php include 'view/header.php'; ?>
<main>
    <br>
    <p>Welcome <?php echo htmlspecialchars("$fName $lName") ?></p><br>

    <?PHP if (empty($_SESSION['choice'])) : ?>
        <p>Please click options to choose your venue and services</p><br>
    <?php else: ?>
        
        <p>your options</p><br>
        <p><?php echo htmlspecialchars("$venueName") ?></p>

        <?php foreach ($services as $serv) : ?>
            <p><?php echo htmlspecialchars("$serv") ?></p>
        <?php endforeach; ?>
        <br>
        
    <?php endif; ?>
    <p><a href=".?action=showOptions">options</a></p>
    <p><a href=".?action=logout">Logout</a></p>
</main>
<?php include 'view/footer.php'; ?>