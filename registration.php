<?php include 'view/header.php'; ?>
<body>
    <p>Please register.</p>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="addUser">
        <label for="firstName">First Name: </label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName) ?>"><br>
        <!--<br>-->
        <label for="lastName">Last Name: </label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName) ?>"><br>
        <!--<br>-->
        <label for="email">Email Address: </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>"><br>
        <!--<br>-->
        <label for="address">Address: </label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($address) ?>"><br>
        <!--<br>-->
        <label for="city">City: </label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($city) ?>"><br>
        <!--<br>-->
        <label for="zip">Zip: </label>
        <input type="text" name="zip" value="<?php echo htmlspecialchars($zip) ?>"><br>
        <!--<br>-->
        <label for="phone">Phone: </label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone) ?>"><br>
        <!--<br>-->
        <label for="password">Password: </label>
        <input type="text" name="password" value="<?php echo htmlspecialchars($password) ?>"><br>
        <!--<br>-->
        <label>&nbsp;</label>
        <input type="submit" value="Register">
    </form>

</body>
<?php include 'view/footer.php'; ?>

